@extends('student.admin.layouts.app')
@section('title', 'الكتب الالكترونية')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">الكتب الالكترونية</div>
        <button class="btn btn-success" id="toggleFormBtn">
            <i class="fas fa-plus"></i> إضافة كتاب جديد
        </button>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm d-none" id="bookFormCard"> <!-- أخفينا النموذج -->
                <div class="card-header text-black">
                    <h5 class="mb-0">إضافة كتاب جديد</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="title" class="form-label">العنوان</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <div class="col-md-4">
                                <label for="file_path" class="form-label">رابط الكتاب (PDF)</label>
                                <input type="file" class="form-control" id="file_path" name="file_path" required>
                            </div>

                            <div class="col-md-4">
                                <label for="course_id" class="form-label">المساق المرتبط</label>
                                <select class="form-select" name="course_id" required>
                                    <option value="">-- اختر المساق --</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus ml-1"></i> إضافة
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <form method="GET" action="">
            <div class="input-group mb-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="ابحث باسم الكتاب أو عنوانه">
                <button class="btn btn-primary" type="submit">بحث</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">رجوع</a>
            </div>
        </form>

        <table class="table table-striped table-bordered align-middle text-center rounded shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>المساق</th>
                    <th>حجم الكتاب</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ Str::limit($book->description, 50) }}</td>
                        <td>{{ $book->course->name_ar ?? 'غير معروف' }}</td>
                        <td>{{ $book->file_size }}</td>
                        <td>
                            <form action="{{ route('admin.book.delete', $book->id) }}" method="POST" class="delete-form"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">
                                    حذف الكتاب
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">لا توجد كتب حاليًا.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    </div>


@endsection

<!-- ✅ JavaScript لإظهار/إخفاء الفورم -->
@section('script')
    <script>
        document.getElementById('toggleFormBtn').addEventListener('click', function () {
            const formCard = document.getElementById('bookFormCard');
            formCard.classList.toggle('d-none');
        });
    </script>
@endsection