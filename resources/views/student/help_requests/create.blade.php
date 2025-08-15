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