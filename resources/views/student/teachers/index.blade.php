@extends('student.layouts.app')
@section('title', 'المدرسين')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <h1 class="dashboard-header mb-0">المدرسين</h1>
        <form action="{{ route('student.teachers.index') }}" method="GET" class="w-50">
            <div class="input-group">
                <input type="text" class="form-control border-primary" name="search"
                    placeholder="ابحث عن مدرس بالاسم أو البريد..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                    <button class="btn btn-secondary" type="reset" onclick="window.location.href='{{ route('student.teachers.index') }}'">
                        <i class="fas fa-times"></i> إلغاء
                </button>
            </div>
        </form>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                @forelse ($teachers as $teacher)
                    <a href="{{ route('student.teachers.show', $teacher->id) }}" class="list-group-item list-group-item-action teacher-card-simple">
                        <div class="d-flex justify-content-around align-items-center py-2">
                            <div class="">
                                @if($teacher->profile_picture)
                                    <img src="{{ asset('storage/' . $teacher->profile_picture) }}"
                                        class="rounded-circle border-primary" width="70" height="70" alt="{{ $teacher->name }}">
                                @else
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 70px; height: 70px;">
                                        <i class="fas fa-user fa-2x"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="">
                                <h5 class="mb-1 text-primary">{{ $teacher->name }}</h5>
                                <small class="text-muted d-block">
                                    <i class="fas fa-envelope me-1"></i> {{ $teacher->email }}
                                </small>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="list-group-item text-center py-5">
                        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                        <p class="text-muted mb-0">لا يوجد مدرسين متاحين حالياً</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    @if($teachers->hasPages())
        <div class="mt-3">
            {{ $teachers->appends(['search' => request('search')])->links() }}
        </div>
    @endif
@endsection

@section('style')
    <style>
        .teacher-card-simple {
            transition: all 0.3s ease;
            border-right: 3px solid transparent;
            text-decoration: none;
            padding: 1rem;
        }

        .teacher-card-simple:hover {
            background-color: #f8f9fa;
            border-right: 3px solid #4e73df;
            transform: translateX(-5px);
        }

        .list-group-item {
            border-top: 1px solid rgba(0,0,0,.125);
            border-left: none;
            border-bottom: none;
            border-right: none;
        }

        .list-group-item:first-child {
            border-top: none;
        }
    </style>
@endsection