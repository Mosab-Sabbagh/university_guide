@extends('superAdmin.layouts.app')
@section('title', 'إضافة كلية')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">إضافة كلية جديدة</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('super_admin.college.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name_ar" class="form-label">اسم الكلية (عربي):</label>
                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required>
                    @error('name_ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name_en" class="form-label">اسم الكلية (انجليزي):</label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en') }}" required>
                    @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="abbreviation" class="form-label">الاختصار:</label>
                    <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" id="abbreviation" name="abbreviation" value="{{ old('abbreviation') }}">
                    @error('abbreviation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">الوصف:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="universities" class="form-label">اختر الجامعات التي تتوفر فيها هذه الكلية:</label>
                    <select name="universities[]" id="universities" multiple class="form-control @error('universities') is-invalid @enderror">
                        @foreach($universities as $university)
                            <option value="{{ $university->id }}" {{ (collect(old('universities'))->contains($university->id)) ? 'selected' : '' }}>
                                {{ $university->name_ar }}
                            </option>
                        @endforeach
                    </select>
                    @error('universities')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">إضافة الكلية</button>
                <a href="{{ route('super_admin.college.index') }}" class="btn btn-secondary">إلغاء</a>
            </form>
        </div>
    </div>
</div>
@endsection
