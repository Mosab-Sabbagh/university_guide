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
                                        @if($comment->file)
                                            <div class="comment-file">
                                                <a href="{{ asset('storage/' . $comment->file) }}" download>📎 تحميل المرفق</a>
                                            </div>
                                        @endif
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

    @include('student.help_requests.create')

@endsection

@section('script')
    <script src="{{ asset('js/help-comments.js') }}"></script>
    <script src="{{ asset('js/help-request.js') }}"></script>
@endsection