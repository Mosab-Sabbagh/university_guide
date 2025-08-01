@extends('student.layouts.app')
@section('title', 'عروضي في سوق الكتب')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">عروضي في سوق الكتب</div>
    </div>

    <div class="book-posts-list">
        @if($bookPosts->isEmpty())
            <div class="alert alert-info">لا توجد عروضي في سوق الكتب حتى الآن.</div>
        @else
            @foreach ($bookPosts as $post)
                <div class="book-post card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">{{ $post->title }}</h5>
                        <p class="card-text text-muted mb-3">{{ Str::limit($post->description, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge {{ $post->is_free ? 'bg-success' : 'bg-primary' }}">
                                {{ $post->is_free ? 'مجاني' : 'للبيع' }}
                            </span>
                            <span class="badge {{ $post->status == 'available' ? 'bg-success' : 'bg-danger' }}">
                                {{ $post->status == 'available' ? 'متاح' : 'مغلق' }}
                            </span>
                            <a href="{{ route('student.bookRequests.showReqestsForPost', $post->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> التفاصيل
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    
@endsection