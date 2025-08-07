@extends('student.admin.layouts.app')
@section('title', 'المدرسين')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0"> المدرسين </div>
        <button class="btn btn-success" id="toggleFormBtn">
            <i class="fas fa-plus"></i> إضافة مدرس جديد
        </button>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm d-none" id="bookFormCard">
                <div class="card-header text-black">
                    <h5 class="mb-0">إضافة مدرس جديد</h5>
                </div>
                <div class="card-body">
                    {{-- show errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.teacher.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">اسم المدرس</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="profile_picture" class="form-label">صورة المدرس</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">رقم الهاتف</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="biography" class="form-label">السيرة الذاتية</label>
                                <textarea class="form-control" id="biography" name="biography" rows="3"
                                    required>{{ old('biography') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="course_id" class="form-label">المساقات المرتبطة</label>
                                <select class="form-select" name="course_ids[]" id="course_id" multiple required>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ (collect(old('course_ids'))->contains($course->id)) ? 'selected' : '' }}>
                                            {{ $course->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">لتحديد أكثر من مساق يمكنك البحث</small>
                            </div>
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
                    placeholder="ابحث باسم  المدرس أو البريد الإلكتروني ">
                <button class="btn btn-primary" type="submit">بحث</button>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">رجوع</a>
            </div>
        </form>

        <table class="table table-striped table-bordered align-middle text-center rounded shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>اسم المدرس</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>المساقات المرتبطة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>
                            @if($teacher->courses->count())
                                {{ $teacher->courses->pluck('name_ar')->implode(', ') }}
                            @else
                                لا يوجد مساقات مرتبطة
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('admin.teacher.delete', $teacher->id)}}" method="POST"
                                class="d-inline d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">لم يتم تسجيل مدرسين حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $teachers->links() }}
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

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#course_id').select2({
                placeholder: "اختر المساقات",
                allowClear: true,
                width: '100%',
                dir: "rtl" // لو بدك الاتجاه من اليمين
            });
        });
    </script>

@endsection