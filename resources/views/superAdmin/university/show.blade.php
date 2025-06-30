@extends('superAdmin.layouts.app')
@section('title', 'عرض الجامعة')

@section('content')
<div class="container mt-4 mb-5">
    <div class="card shadow-sm border rounded-3">
        <div class="card-body p-4">
            <h1 class="card-title mb-3 text-center text-success fw-bold fs-3">
                <i class="bi bi-university me-2 text-success"></i> تفاصيل الجامعة: {{ $university->name_ar }}
            </h1>
            <p class="text-center text-muted mb-4 small">نظرة عامة على الكليات والتخصصات التابعة لهذه الجامعة.</p>
            <hr class="mb-4 border-success opacity-10">

            <div class="row mb-4 justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="bg-light p-3 rounded-2 shadow-sm d-flex align-items-center justify-content-center">
                        <i class="bi bi-globe me-2 fs-5 text-secondary"></i>
                        <h5 class="mb-0 text-dark fw-semibold">
                            الاسم بالإنجليزية: <span class="text-primary">{{ $university->name_en }}</span>
                        </h5>
                    </div>
                </div>
            </div>

            <h2 class="mb-3 text-dark d-flex align-items-center fs-4">
                <i class="bi bi-building-fill-gear me-2 text-primary fs-5"></i> الكليات التابعة
            </h2>

            @if($university->colleges->isEmpty())
                <div class="alert alert-info text-center py-3 rounded-2 shadow-sm small">
                    <i class="bi bi-exclamation-circle-fill me-2"></i> لا توجد كليات مسجلة لهذه الجامعة حتى الآن.
                </div>
            @else
                <div class="list-group">
                    @foreach($university->colleges as $college)
                        <div class="list-group-item list-group-item-action py-3 mb-2 rounded-2 shadow-sm d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0 fw-bold text-dark">
                                    <i class="bi bi-mortarboard-fill text-info me-2"></i> {{ $college->name_ar }}
                                </h6>
                                <span class="badge bg-secondary-subtle text-secondary px-2 py-1 rounded-pill small font-monospace">
                                    {{ $college->name_en }}
                                </span>
                            </div>

                            @if($college->majors->isNotEmpty())
                                <h6 class="mb-2 mt-1 text-muted fw-semibold small d-flex align-items-center">
                                    <i class="bi bi-journal-check me-2 text-warning"></i> التخصصات داخل هذه الكلية:
                                </h6>
                                <ul class="list-group list-group-flush border-top border-bottom rounded-2 overflow-hidden">
                                    @foreach($college->majors as $major)
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-2 px-3 small">
                                            <span>
                                                <i class="bi bi-dot text-primary fs-5 me-1"></i>
                                                <span class="fw-semibold">{{ $major->name_ar }}</span>
                                            </span>
                                            <span class="badge bg-primary-subtle text-primary font-monospace px-2 py-1 rounded-pill small">
                                                {{ $major->name_en }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="alert alert-light text-center border-0 py-2 rounded-2 mt-2 small">
                                    <i class="bi bi-info-circle me-2"></i> لا توجد تخصصات مسجلة لهذه الكلية.
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('super_admin.university.index') }}" class="btn btn-outline-success px-4 py-2 rounded-pill shadow-sm">
                    <i class="bi bi-arrow-right-circle me-2"></i> الرجوع إلى قائمة الجامعات
                </a>
            </div>
        </div>
    </div>
</div>
@endsection