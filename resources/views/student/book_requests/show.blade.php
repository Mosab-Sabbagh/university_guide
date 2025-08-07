@extends('student.layouts.app')

@section('title', 'تفاصيل طلب الكتاب')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 fw-semibold">تفاصيل طلب كتاب "{{ $bookName }}"</h5>
                </div>

                <div>
                    <a href="{{ route('student.bookPosts.postsByUserId', Auth::id()) }}"
                        class="btn btn-light btn-sm border-0 text-primary">
                        <i class="fas fa-arrow-right me-1"></i> العودة إلى عروضي
                    </a>
                </div>
            </div>

            <div class="card-body">
                @foreach ($bookRequests as $bookRequest)
                    <div class="request-item mb-4 p-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-start">
                            <span class="badge 
                                    @if($bookRequest->status == 'pending') bg-warning
                                    @elseif($bookRequest->status == 'accepted') bg-success
                                    @else bg-danger @endif">
                                @if($bookRequest->status == 'pending') قيد الانتظار
                                @elseif($bookRequest->status == 'accepted') مقبول
                                @else مرفوض @endif
                            </span>
                        </div>

                        <p class="card-text mt-2">{{ $bookRequest->message }}</p>

                        <div class="request-meta mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1">
                                        <i class="fas fa-user"></i>
                                        <strong>المرسل:</strong> {{ $bookRequest->user->name }}
                                    </p>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <p class="mb-1 text-muted">
                                        <i class="far fa-clock"></i>
                                        تم الإرسال في: {{ $bookRequest->created_at ? $bookRequest->created_at->format('Y-m-d H:i') : 'غير محدد' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- btn accept request --}}
                        @if($bookRequest->status == 'pending')
                            <form action="{{route('student.bookRequests.accept')}}" method="POST" class="mt-3">
                                @csrf
                                <input type="hidden" name="book_post_id" value="{{ $bookRequest->book_post_id }}">
                                <input type="hidden" name="request_id" value="{{ $bookRequest->id }}">
                                <input type="hidden" name="user_id" value="{{ $bookRequest->user->id }}">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-check me-1"></i> قبول الطلب
                                </button>
                            </form>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .request-item {
            transition: all 0.3s ease;
        }

        .request-item:hover {
            background-color: #f8f9fa;
        }

        .card-header {
            border-radius: 0.375rem 0.375rem 0 0 !important;
        }
    </style>
@endsection