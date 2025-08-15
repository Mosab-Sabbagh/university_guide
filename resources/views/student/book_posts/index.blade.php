@extends('student.layouts.app')
@section('title', 'سوق الكتب')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">سوق الكتب</div>
        <button class="btn btn-success d-flex align-items-center gap-2"
            style="border-radius: 8px; font-weight:500; font-size:1rem;" data-bs-toggle="modal"
            data-bs-target="#addPostModal">
            <i class="fa fa-plus"></i>
            إضافة عرض كتاب
        </button>
    </div>
    @include('student.book_posts.create')

    <div class="book-posts-list">
        <div class="book-search-container mb-4">
            <form action="" method="GET" class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control search-input" placeholder="ابحث عن كتاب، عنوان،.."
                        value="{{ request('search') }}" aria-label="بحث عن كتب">

                    <button class="btn btn-primary search-btn" type="submit">
                        <i class="fas fa-search me-1"></i> بحث
                    </button>

                    @if(request('search'))
                        <a href="{{ route('student.bookPosts.index') }}" class="btn btn-outline-danger cancel-btn">
                            <i class="fas fa-times me-1"></i> إلغاء
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @forelse ($bookPosts as $post)
            <div class="book-post card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- الجزء الأيسر (معلومات الكتاب) -->
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0 text-truncate pe-2">{{ $post->title }}</h5>
                                <div class="d-flex gap-2">
                                    <span class="badge {{ $post->is_free ? 'bg-success' : 'bg-primary' }}">
                                        {{ $post->is_free ? 'مجاني' : 'للبيع' }}
                                    </span>
                                    <span class="badge {{ $post->status == 'available' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $post->status == 'available' ? 'متاح' : 'مغلق' }}
                                    </span>
                                </div>
                            </div>

                            <p class="card-text text-muted mb-3">{{ Str::limit($post->description, 120) }}</p>

                            <div class="book-meta d-flex flex-wrap align-items-center gap-4 mt-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle me-2 text-secondary"></i>
                                    <small class="text-nowrap">{{ $post->user->name }}</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-2 text-secondary"></i>
                                    <small class="text-nowrap">{{ $post->created_at ? $post->created_at->diffForHumans() : '' }}</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope me-2 text-secondary"></i>
                                    <small class="text-nowrap">{{ $post->requests_count }} طلب</small>
                                </div>
                            </div>
                        </div>

                        <!-- الجزء الأيمن (السعر والزر) -->
                        <div class="col-md-4 mt-3 mt-md-0">
                            <div class="d-flex flex-column align-items-end h-100">
                                @if (!$post->is_free)
                                    <div class="price-display mb-3 text-end">
                                        <span class="fw-bold h4 text-primary">{{ number_format($post->price, 2) }}</span>
                                        <span class="text-muted"> شيكل</span>
                                    </div>
                                @endif
                                <a href="{{route('student.book_post.show', $post->id)}}" class="btn btn-primary px-4 mt-auto">
                                    التفاصيل <i class="fas fa-chevron-left ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center py-4">
                <i class="fas fa-info-circle me-2"></i>
                لا توجد عروض كتب حالياً.
            </div>
        @endforelse
    </div>

    <style>
        .book-post {
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .book-post:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-color: rgba(0, 0, 0, 0.12);
        }

        .card-title {
            font-size: 1.25rem;
            color: #333;
        }

        .card-text {
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .book-meta {
            font-size: 0.85rem;
        }

        .book-meta i {
            width: 18px;
            text-align: center;
        }

        .badge {
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
        }

        .price-display {
            background: rgba(13, 110, 253, 0.08);
            padding: 8px 12px;
            border-radius: 8px;
            display: inline-block;
        }

        @media (max-width: 767.98px) {
            .book-post {
                border-radius: 10px;
            }

            .col-md-8,
            .col-md-4 {
                width: 100%;
            }

            .d-flex.flex-column {
                align-items: flex-start !important;
            }

            .price-display {
                margin-top: 15px;
            }
        }
    </style>

@endsection