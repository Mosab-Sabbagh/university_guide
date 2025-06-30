@extends('superAdmin.layouts.app')
@section('title', 'تفاصيل الكلية')
@section('content')
<div class="container mt-4 mb-5">
    <div class="card shadow-sm border rounded-3">
        <div class="card-body p-4">
            <h3 class="card-title mb-3 text-center text-primary fw-bold fs-3">
                <i class="bi bi-mortarboard-fill me-2 text-primary"></i> تفاصيل الكلية: {{ $college->name_ar }}
            </h3>
            <p class="text-center text-muted mb-4 small">استكشف التخصصات والجامعات المرتبطة بهذه الكلية.</p>
            <hr class="mb-4 border-primary opacity-10">

            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 bg-light">
                        <div class="card-body p-3">
                            <h5 class="fw-bold mb-3 text-dark d-flex align-items-center fs-5">
                                <i class="bi bi-bookmark-star-fill text-warning me-2 fs-5"></i> التخصصات المرتبطة
                            </h5>
                            @if($college->majors->isEmpty())
                                <div class="alert alert-info text-center py-3 rounded-2 small">
                                    <i class="bi bi-info-circle-fill me-2"></i> لا يوجد تخصصات مرتبطة بهذه الكلية حاليًا.
                                </div>
                            @else
                                <ul class="list-group list-group-flush border-top border-bottom rounded-2 overflow-hidden">
                                    @foreach($college->majors as $major)
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-2 px-3 small">
                                            <span>
                                                <i class="bi bi-dot text-primary fs-5 me-1"></i>
                                                <span class="fw-semibold">{{ $major->name_ar }}</span>
                                                <span class="text-muted ms-1 extra-small">({{ $major->code }})</span>
                                            </span>
                                            <span class="badge bg-primary-subtle text-primary px-2 py-1 rounded-pill extra-small font-monospace">
                                                {{ $major->name_en }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 bg-light">
                        <div class="card-body p-3">
                            <h5 class="fw-bold mb-3 text-dark d-flex align-items-center fs-5">
                                <i class="bi bi-building text-success me-2 fs-5"></i> الجامعات المرتبطة بهذه الكلية
                            </h5>
                            @if($college->universities->isEmpty())
                                <div class="alert alert-info text-center py-3 rounded-2 small">
                                    <i class="bi bi-info-circle-fill me-2"></i> لا توجد جامعات مرتبطة بهذه الكلية حاليًا.
                                </div>
                            @else
                                <ul class="list-group list-group-flush border-top border-bottom rounded-2 overflow-hidden">
                                    @foreach($college->universities as $university)
                                        <li class="list-group-item d-flex align-items-center py-2 px-3 small">
                                            <i class="bi bi-university-fill text-success me-2 fs-5"></i>
                                            <span class="fw-semibold text-dark">{{ $university->name_ar }}</span>
                                            <span class="ms-1 text-muted extra-small">({{ $university->abbreviation }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('super_admin.college.index') }}" class="btn btn-outline-primary px-4 py-2 rounded-pill shadow-sm">
                    <i class="bi bi-arrow-right-circle me-2"></i> الرجوع إلى قائمة الكليات
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
