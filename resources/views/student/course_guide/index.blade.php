@extends('student.layouts.app')
@section('title', 'دليل المساقات')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title" style="">
        <div class="dashboard-header mb-0">دليل المساقات</div>
    </div>
    {{-- card of course_guide bootsarb forelse ($courses)--}}
    {{-- serch input --}}
    <form method="GET" action="{{ route('student.course_guide.index') }}">
        <div class="input-group mb-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="ابحث باسم المساق أو رقم الكود">
            <button class="btn btn-primary" type="submit">بحث</button>
            <a href="{{ route('student.course_guide.index') }}" class="btn btn-secondary" type="submit">رجوع</a>
        </div>
    </form>
    @forelse ($courses as $course)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $course->name_ar }}</h5>
                <p class="card-text">{{ $course->description }}</p>
            </div>
        </div>
    @empty
        <div class="alert alert-warning" role="alert">
            لا توجد مساقات متاحة حاليًا.
        </div>
    @endforelse

@endsection