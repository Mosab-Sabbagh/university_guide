@extends('superAdmin.layouts.app')
@section('title', 'تعديل الكلية')
@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">تعديل الكلية</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('super_admin.college.update', $college->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="university_id" class="form-label">الجامعة:</label>
                        <select class="form-control @error('university_id') is-invalid @enderror" id="university_id" name="university_id" required>
                            <option value="">اختر الجامعة</option>
                            @foreach($universities as $university)
                                <option value="{{ $university->id }}" {{ (old('university_id', $college->university_id) == $university->id) ? 'selected' : '' }}>
                                    {{ $university->name_ar }}
                                </option>
                            @endforeach
                        </select>
                        @error('university_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name_ar" class="form-label">اسم الكلية (عربي):</label>
                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar', $college->name_ar) }}" required>
                        @error('name_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name_en" class="form-label">اسم الكلية (انجليزي):</label>
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en', $college->name_en) }}" required>
                        @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="abbreviation" class="form-label">الاختصار:</label>
                        <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" id="abbreviation" name="abbreviation" value="{{ old('abbreviation', $college->abbreviation) }}">
                        @error('abbreviation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $college->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">تحديث الكلية</button>
                </form>
            </div>
        </div>
    </div>
@endsection