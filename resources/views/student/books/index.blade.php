@extends('student.layouts.app')
@section('title', 'الكتب الالكترونية')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">الكتب الالكترونية</div>
        <small> <i> غير مخصص لكل جامعة على حدة </i></small>
    </div>

    <div class="table-responsive">
        <form method="GET" action="">
            <div class="input-group mb-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="ابحث باسم الكتاب أو عنوانه">
                <button class="btn btn-primary" type="submit">بحث</button>
                <a href="{{ route('student.books.index') }}" class="btn btn-secondary">رجوع</a>
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
                    <th>تحميل</th>
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
                            <a href="{{ route('book.download', $book->id) }}" class="btn btn-outline-primary btn-sm">
                                تحميل الكتاب
                            </a>
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