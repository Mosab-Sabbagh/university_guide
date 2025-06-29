@extends('superAdmin.layouts.app')
@section('title', 'إضافة جامعة')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">إضافة جامعة جديدة</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('super_admin.university.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name_ar" class="form-label">اسم الجامعة (عربي):</label>
                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" **required** >
                    @error('name_ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name_en" class="form-label">اسم الجامعة (انجليزي):</label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en') }}" **required**>
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
                    <label for="city" class="form-label">المدينة:</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">العنوان:</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">الموقع الإلكتروني:</label>
                    <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}">
                    @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الهاتف:</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
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
                <button type="submit" class="btn btn-primary">إضافة الجامعة</button>
            </form>
        </div>
    </div>
</div>
@endsection
