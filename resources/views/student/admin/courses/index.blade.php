@extends('student.admin.layouts.app')
@section('title', 'المساقات ')
@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0"> المساقات </div>
        <button class="btn btn-success" id="toggleFormBtn">
            <i class="fas fa-plus"></i> إضافة مساق جديد
        </button>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm d-none" id="bookFormCard">
                    <div class="card-header  text-black">
                        <h5 class="mb-0">إضافة مساق جديد</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin.courses.store')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="name_ar" class="form-label">الاسم بالعربي</label>
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="name_en" class="form-label">الاسم بالإنجليزي</label>
                                    <input type="text" class="form-control" id="name_en" name="name_en" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="code" class="form-label">الكود</label>
                                    <input type="text" class="form-control" id="code" name="code" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">الوصف</label>
                                <textarea class="form-control" id="description" name="description" rows="4"
                                    required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus ml-1"></i>
                                إضافة
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">قائمة المساقات</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم المساق </th>
                                        <th>اسم المساق e </th>
                                        <th>الكود</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($courses as $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$course->name_ar}}</td>
                                            <td>{{$course->name_en}}</td>
                                            <td>{{$course->code}}</td>
                                            <td>
                                                <a href="{{route('admin.courses.edit', $course->id)}}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{route('admin.course.delete', $course->id)}}" method="post"
                                                    class="d-inline delete-form" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">لا توجد مساقات متاحة</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('toggleFormBtn').addEventListener('click', function () {
            const formCard = document.getElementById('bookFormCard');
            formCard.classList.toggle('d-none');
        });
    </script>
@endsection