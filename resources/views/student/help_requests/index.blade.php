@extends('student.layouts.app')
@section('title', 'المساعدة الأكاديمية')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">ركن المساعدة الأكاديمية</div>
        <button class="btn btn-success d-flex align-items-center gap-2"
            style="border-radius: 8px; font-weight:500; font-size:1rem;" data-bs-toggle="modal"
            data-bs-target="#addPostModal">
            <i class="fa fa-plus"></i>
            إضافة منشور
        </button>
    </div>

    <div id="postsContainer">
        @foreach($helpRequests as $helpRequest)
            <div class="post-card" id="post-{{ $helpRequest->id }}">
                <div class="post-header d-flex justify-content-between align-items-center">
                    {{-- معلومات المستخدم --}}
                    <div class="d-flex align-items-center">
                        {{-- الصورة --}}
                        @if($helpRequest->user && $helpRequest->user->student->profile_image)
                            <div class="post-avatar me-2">
                                <img src="{{ asset('storage/' . $helpRequest->user->student->profile_image) }}" alt="صورة المستخدم"
                                    class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            </div>
                        @else
                            <div class="post-avatar me-2">
                                <i class="fa fa-user text-secondary" style="font-size: 20px;"></i>
                            </div>
                        @endif

                        {{-- الاسم والتاريخ --}}
                        <div>
                            <div class="post-user fw-bold">{{ $helpRequest->user->name ?? 'مستخدم' }}</div>
                            @if($helpRequest->created_at)
                                <div class="post-time text-muted small">{{ $helpRequest->created_at->diffForHumans() }}</div>
                            @endif
                        </div>
                    </div>

                    {{-- النقاط الثلاث (Dropdown) --}}
                    @if(Auth::id() === $helpRequest->user_id)
                        <div class="dropdown">
                            <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <button class="btn btn-sm btn-primary edit-post-btn" data-id="{{ $helpRequest->id }}"
                                        data-title="{{ $helpRequest->title }}" data-content="{{ $helpRequest->content }}"
                                        data-update-url="{{ route('student.help_requests.update', $helpRequest->id) }}">
                                        تعديل
                                    </button>
                                </li>
                                <li id="post-{{ $helpRequest->id }}">
                                    <button class="btn btn-sm btn-danger delete-post-btn" data-id="{{ $helpRequest->id }}"
                                        data-url="{{ route('student.help_requests.destroy', $helpRequest->id) }}">
                                        حذف
                                    </button>
                                </li>

                            </ul>
                        </div>
                    @endif
                </div>

                {{-- محتوى المنشور --}}
                <div>
                    @if($helpRequest->title)
                        <span class="post-title blue">{{ $helpRequest->title }}</span>
                    @endif
                    <div style="white-space: pre-line;">{{ $helpRequest->content }}</div>
                    @if($helpRequest->image)
                        <img src="{{ asset('storage/' . $helpRequest->image) }}" class="post-image" alt="صورة منشور">
                    @endif
                </div>

                <div class="post-actions">
                    <span>
                        <i class="fa fa-comment"></i>
                        <span class="comment-count" id="comment-count-{{ $helpRequest->id }}">
                            {{ $helpRequest->comments()->count() }}
                        </span> تعليقات
                    </span>

                    <span class="add-comment-toggle" onclick="toggleAddComment(this)">
                        <i class="fa fa-plus"></i> إضافة تعليق
                    </span>
                </div>

                <div class="add-comment-box">
                    <form action="{{ route('student.comments.store', $helpRequest->id) }}" method="POST" class="comment-form"
                        data-post-id="{{ $helpRequest->id }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="add-comment-input @error('content') is-invalid @enderror" name="content"
                            placeholder="اكتب تعليقك..." required>
                        @error('content') <div class="text-danger small">{{ $message }}</div> @enderror

                        <input type="file" class="add-comment-file @error('file') is-invalid @enderror" name="file" accept="*"
                            onchange="showSelectedFile(this)">
                        <label class="add-comment-file-label" onclick="this.previousElementSibling.click()">
                            <i class="fa fa-paperclip"></i> ملف
                        </label>
                        <span class="selected-file-name"></span>
                        @error('file') <div class="text-danger small">{{ $message }}</div> @enderror
                        <button type="submit" class="add-comment-btn"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>

                <div class="comments-list" id="comments-{{ $helpRequest->id }}">
                    @foreach($helpRequest->comments as $comment)
                        <div class="comment-item d-flex justify-content-between align-items-start" id="comment-{{ $comment->id }}">
                            {{-- <div class="comment-avatar"><i class="fa fa-user"></i></div> --}}
                            <div class="d-flex align-items-start">
                                <div class="comment-avatar me-2">
                                    <i class="fa fa-user text-secondary" style="font-size: 20px;"></i>
                                </div>
                                <div class="comment-body">
                                    <span class="comment-author">{{ $comment->user->name }}:</span>
                                    <span class="comment-content">{{ $comment->content }}</span>
                                </div>
                            </div>
                            @if(Auth::id() === $comment->user_id)
                                <div class="dropdown">
                                    <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i> {{-- النقاط الثلاث --}}
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button class="dropdown-item btn-edit" data-id="{{ $comment->id }}"
                                                data-help-id="{{ $helpRequest->id }}">
                                                تعديل
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item btn-delete text-danger" data-id="{{ $comment->id }}"
                                                data-help-id="{{ $helpRequest->id }}">
                                                حذف
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>

    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="d-flex align-items-center justify-content-around p-4">
                    <h5 class="modal-title" id="addPostModalLabel">إضافة منشور جديد</h5>
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="modal" aria-label="إغلاق"
                        style="filter: invert(41%) sepia(94%) saturate(7497%) hue-rotate(353deg) brightness(97%) contrast(104%);"></button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-body">
                    <form id="addPostForm" action="{{ route('student.help_requests.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">عنوان المنشور</label>
                            <input type="text" class="form-control" id="postTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">نص المنشور</label>
                            <textarea class="form-control" id="postText" name="content" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> صورة (اختياري)</label>
                            <input type="file" class="form-control" id="postFile" name="image"
                                onchange="showPostFileName(this)">
                            <span id="postFileName" class="selected-file-name"></span>
                        </div>
                        <button type="submit" class="btn btn-success">نشر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/help-comments.js') }}"></script>
    <script src="{{ asset('js/help-request.js') }}"></script>
@endsection