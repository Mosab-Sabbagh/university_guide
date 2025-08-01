@extends('student.layouts.app')
@section('title', 'تفاصيل عرض الكتاب')

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- تفاصيل الكتاب -->
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h3 class="fw-bold mb-0">{{ $bookPost->title }}</h3>
                        <span class="badge {{ $bookPost->is_free ? 'bg-success' : 'bg-primary' }}">
                            {{ $bookPost->is_free ? 'مجاني' : 'للبيع' }}
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="book-cover bg-light rounded text-center p-4">
                                    <i class="fas fa-book-open fa-4x text-secondary"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h5 class="text-muted">تفاصيل الكتاب</h5>
                                <p class="lead">{{ $bookPost->description }}</p>

                                <div class="book-meta mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-user-circle me-2 text-secondary"></i>
                                        <span class="fw-bold">الناشر:</span>
                                        <span class="me-3">{{ $bookPost->user->name }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-calendar-alt me-2 text-secondary"></i>
                                        <span class="fw-bold">تاريخ النشر:</span>
                                        <span>{{ $bookPost->created_at->format('Y-m-d') }}</span>
                                    </div>
                                    @if(!$bookPost->is_free)
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-tag me-2 text-secondary"></i>
                                            <span class="fw-bold">السعر:</span>
                                            <span class="text-primary fw-bold">{{ number_format($bookPost->price, 2) }}
                                                شيكل</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- نموذج طلب الكتاب -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="fw-bold mb-0">تقديم طلب للحصول على الكتاب</h5>
                    </div>
                    @if (Auth::user()->id == $bookPost->user_id)
                        <div class="card-body">
                            <p class="text-muted">لا يمكنك تقديم طلب للحصول على كتاب قمت بنشره.</p>
                        </div>
                    @else
                        <div class="card-body">
                            <form action="{{route('student.bookRequests.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="book_post_id" value="{{ $bookPost->id }}">

                                <div class="mb-3">
                                    <label for="message" class="form-label">رسالتك إلى البائع</label>
                                    <textarea class="form-control" id="message" name="message" rows="4"
                                        placeholder="أكتب رسالة توضح سبب رغبتك في الحصول على الكتاب" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    <i class="fas fa-paper-plane me-2"></i> إرسال الطلب
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

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