@extends('student.layouts.app')
@section('title', 'المدرس ' . $teacher->name)
@section('content')
<div class="d-flex justify-content-between mb-4">
    <a href="{{ route('student.teachers.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-right"></i> الرجوع للمدرسين
    </a>
</div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            @if($teacher->profile_picture)
                                <img src="{{ asset('storage/' . $teacher->profile_picture) }}"
                                    class="rounded-circle border border-primary p-1" width="120" height="120"
                                    alt="{{ $teacher->name }}">
                            @else
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center border border-primary p-1 mx-auto"
                                    style="width: 120px; height: 120px;">
                                    <i class="fas fa-user fa-3x"></i>
                                </div>
                            @endif
                        </div>

                        <h3 class="fw-bold mb-1">{{ $teacher->name }}</h3>
                        <p class="text-muted">
                            <i class="fas fa-envelope me-1"></i> {{ $teacher->email }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h4 class="fw-bold mb-0">معلومات المدرس</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="text-primary fw-bold">السيرة الذاتية</h5>
                            <p class="text-secondary">{{ $teacher->biography ?? 'لا توجد سيرة ذاتية متاحة حالياً.' }}</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary fw-bold">الدورات</h5>
                            @forelse($teacher->courses as $course)
                                <span class="badge bg-primary text-white me-1 mb-1 p-2">
                                    {{ $course->name_ar }}
                                </span>
                            @empty
                                <span class="text-muted">لا يوجد دورات لهذا المدرس حالياً.</span>
                            @endforelse
                        </div>

                        <div>
                            <h5 class="text-primary fw-bold">معلومات الاتصال</h5>
                            <p class="text-secondary mb-0">
                                <i class="fas fa-phone me-2"></i> رقم الهاتف: {{ $teacher->phone ?? 'غير متوفر' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .book-cover {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-meta div {
            padding: 5px 0;
        }

        .card {
            border-radius: 10px;
            border: none;
        }

        .card-header {
            border-radius: 10px 10px 0 0 !important;
        }

        /* اخفاء الحاسبة */
        @media (min-width: 992px) {
            .left-sidebar {
                display: none !important;
            }

            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
@endsection