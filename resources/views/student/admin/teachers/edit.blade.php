@extends('student.admin.layouts.app')

@section('title', 'تعديل بيانات مدرس')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">تعديل بيانات المدرس</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">اسم المدرس</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $teacher->name) }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $teacher->email) }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="profile_picture" class="form-label">صورة المدرس</label>
                                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                    @if($teacher->profile_picture)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $teacher->profile_picture) }}" alt="صورة المدرس"
                                                width="100">
                                        </div>
                                    @endif
                                    @error('profile_picture')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone', $teacher->phone) }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="biography" class="form-label">السيرة الذاتية</label>
                                    <textarea class="form-control" id="biography" name="biography" rows="3"
                                        required>{{ old('biography', $teacher->biography) }}</textarea>
                                    @error('biography')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label for="course_id" class="form-label">المساقات المرتبطة</label>
                                    <select class="form-select" name="course_ids[]" id="course_id" multiple required>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ in_array($course->id, old('course_ids', $teacher->courses->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $course->name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">لتحديد أكثر من مساق يمكنك الضغط مع Ctrl</small>
                                    @error('course_ids')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save ml-1"></i>
                                حفظ التعديلات
                            </button>
                            <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times mr-1"></i> إلغاء
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#course_id').select2({
                placeholder: "اختر المساقات",
                allowClear: true,
                width: '100%',
                dir: "rtl"
            });
        });
    </script>

@endsection