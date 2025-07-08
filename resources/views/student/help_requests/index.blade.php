@extends('student.layouts.app')
@section('title', 'المساعدة الأكاديمية')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
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
            <div class="post-card">
                <div class="post-header">
                    @if($helpRequest->user && $helpRequest->user->student->profile_image)
                        <div class="post-avatar">
                            <img src="{{ asset('storage/' . $helpRequest->user->student->profile_image) }}" alt="صورة المستخدم"
                                class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        </div>
                    @else
                        <div class="post-avatar"><i class="fa fa-user"></i></div>
                    @endif
                    <div class="post-user">{{ $helpRequest->user->name ?? 'مستخدم' }}</div>
                    @if($helpRequest->created_at)
                        <span class="post-time">{{ $helpRequest->created_at->diffForHumans() }}</span>
                    @endif
                </div>
                @if($helpRequest->title)
                    <span class="post-title blue">{{ $helpRequest->title }}</span>
                @endif
                <div style="white-space: pre-line;">{{ $helpRequest->content }}</div>
                @if($helpRequest->image)
                    <img src="{{ asset('storage/' . $helpRequest->image) }}" class="post-image" alt="صورة منشور">
                @endif
                <div class="post-actions">
                    {{-- <span><i class="fa fa-comment"></i> {{ $helpRequest->comments->count() }} تعليقات</span> --}}
                    <span class="add-comment-toggle" onclick="toggleAddComment(this)">
                        <i class="fa fa-plus"></i> إضافة تعليق
                    </span>
                </div>
                <div class="add-comment-box">
                    <form action="{{ route('student.comments.store', $helpRequest->id) }}" method="POST"
                        enctype="multipart/form-data">
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
                <div class="comments-list">
                    <div class="comment-item">
                        <div class="comment-avatar"><i class="fa fa-user"></i></div>
                        <div class="comment-body">
                            <span class="comment-author">مستحدم</span>
                            تعليق
                        </div>
                    </div>
                    {{-- @foreach($helpRequest->comments as $comment)
                    <div class="comment-item">
                        <div class="comment-avatar"><i class="fa fa-user"></i></div>
                        <div class="comment-body">
                            <span class="comment-author">{{ $comment->user->name ?? 'مستخدم' }}:</span>
                            {{ $comment->content }}
                        </div>
                    </div>
                    @endforeach --}}
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
    <script>
        // عرض اسم الملف في نموذج إضافة منشور
        function showPostFileName(input) {
            const fileNameSpan = document.getElementById('postFileName');
            if (input.files && input.files[0]) {
                fileNameSpan.textContent = input.files[0].name;
            } else {
                fileNameSpan.textContent = '';
            }
        }


        function toggleAddComment(btn) {
            const box = btn.parentElement.nextElementSibling;
            box.classList.toggle('active');
            if (box.classList.contains('active')) {
                box.querySelector('input[type=text]').focus();
            }
        }
    </script>
@endsection