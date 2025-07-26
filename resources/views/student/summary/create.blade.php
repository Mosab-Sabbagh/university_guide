<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d-flex align-items-center justify-content-around p-4">
                <h5 class="modal-title" id="addPostModalLabel">إضافة تلخيص </h5>
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
                <form id="addSummaryForm" action="{{ route('student.summary.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">المقرر</label>
                        <select class="form-select" name="course_id" required>
                            <option value="">اختر المقرر</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->name_ar }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">عنوان الملخص</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">وصف الملخص</label>
                        <textarea class="form-control" name="description" rows="3"
                            required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رفع ملف الملخص (PDF فقط)</label>
                        <input type="file" class="form-control" name="file_path" accept="application/pdf" required>
                    </div>

                    <button type="submit" class="btn btn-success">رفع الملخص</button>
                </form>

            </div>

        </div>
    </div>
</div>