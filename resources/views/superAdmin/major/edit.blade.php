@extends('superAdmin.layouts.app')
@section('title', 'تعديل تخصص')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>تعديل التخصص</h4>
        </div>

        <div class="card-body">
                <form action="{{ route('super_admin.major.update', $major->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name_ar" class="form-label">اسم التخصص (عربي)</label>
                        <input type="text" name="name_ar" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar', $major->name_ar) }}">
                        @error('name_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name_en" class="form-label">اسم التخصص (إنجليزي)</label>
                        <input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $major->name_en) }}">
                        @error('name_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">رمز التخصص</label>
                        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $major->code) }}">
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $major->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="colleges" class="form-label">اختر الكليات التي يتبع لها هذا التخصص:</label>
                        <select name="colleges[]" id="colleges" multiple class="form-control @error('colleges') is-invalid @enderror">
                            @php
                                $selectedColleges = old('colleges', $major->colleges->pluck('id')->toArray());
                            @endphp
                            @foreach($colleges as $college)
                                <option value="{{ $college->id }}" {{ in_array($college->id, $selectedColleges) ? 'selected' : '' }}>
                                    {{ $college->name_ar }}
                                </option>
                            @endforeach
                        </select>
                        @error('colleges')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">تحديث التخصص</button>
                    <a href="{{ route('super_admin.major.index') }}" class="btn btn-secondary">إلغاء</a>
                </form>
        </div>
    </div>
</div>
@endsection