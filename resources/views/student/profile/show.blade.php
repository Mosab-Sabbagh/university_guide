@extends('student.layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
    <div class="container py-5">
        <a href="{{ route('student.profile.edit') }}" class="btn btn-primary mb-4">
            <i class="fa fa-edit me-2"></i> تعديل الملف الشخصي
        </a>
        <div class="card shadow-lg border-0 rounded-4 p-4">
            <div class="row align-items-center">
                <!-- صورة الطالب -->
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    @if($student->student->profile_image)
                        <img src="{{ asset('storage/' . $student->student->profile_image) }}" alt="الصورة الشخصية" class="rounded-circle shadow" width="150" height="150" style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-secondary d-inline-block" style="width: 150px; height: 150px; line-height: 150px;">
                            <i class="fa fa-user fa-4x text-white"></i>
                        </div>
                    @endif
                    <h4 class="mt-3 mb-1 fw-bold">{{ $student->name }}</h4>
                    <p class="text-muted">{{ $student->email }}</p>
                </div>

                <!-- معلومات الطالب -->
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <strong>رقم الطالب:</strong>
                            <div>{{ $student->student->student_number ?? 'غير متوفر' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>الجامعة:</strong>
                            <div>{{ $student->student->university->name_ar ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>الكلية:</strong>
                            <div>{{ $student->student->college->name_ar ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>التخصص:</strong>
                            <div>{{ $student->student->major->name_ar ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>تاريخ الالتحاق:</strong>
                            <div>{{ $student->student->enrollment_date ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>المستوى الدراسي:</strong>
                            <div>{{ $student->student->level ?? 'غير محدد' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
