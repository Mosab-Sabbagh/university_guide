@extends('superAdmin.layouts.app')

@section('title', 'تعديل جامعة')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">تعديل بيانات الجامعة</h5>
        </div>
        <div class="card-body">
            {{--
                نموذج تعديل بيانات الجامعة.
                - action: يشير إلى مسار التحديث، مع تمرير معرف الجامعة ($university->id).
                - method: يستخدم 'POST' كطريقة افتراضية لـ HTML، ولكن يتم تجاوزها بواسطة @method('PUT') لتتوافق مع RESTful APIs.
                - @csrf: حماية CSRF لمنع الهجمات.
            --}}
            <form action="{{ route('super_admin.university.update', $university->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- تحديد طريقة HTTP لتكون PUT لعملية التعديل --}}

                {{-- حقل اسم الجامعة (عربي) --}}
                <div class="mb-3">
                    <label for="name_ar" class="form-label">اسم الجامعة (عربي):</label>
                    {{--
                        ملء الحقل بقيمة الجامعة الحالية ($university->name_ar) أو بقيمة old() في حال فشل التحقق.
                        تم إضافة 'required' لضمان التحقق من صحة العميل.
                    --}}
                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar', $university->name_ar) }}" required>
                    @error('name_ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل اسم الجامعة (انجليزي) --}}
                <div class="mb-3">
                    <label for="name_en" class="form-label">اسم الجامعة (انجليزي):</label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en', $university->name_en) }}" required>
                    @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل الاختصار --}}
                <div class="mb-3">
                    <label for="abbreviation" class="form-label">الاختصار:</label>
                    <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" id="abbreviation" name="abbreviation" value="{{ old('abbreviation', $university->abbreviation) }}">
                    @error('abbreviation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل المدينة --}}
                <div class="mb-3">
                    <label for="city" class="form-label">المدينة:</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $university->city) }}" required>
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل العنوان --}}
                <div class="mb-3">
                    <label for="address" class="form-label">العنوان:</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $university->address) }}">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل الموقع الإلكتروني --}}
                <div class="mb-3">
                    <label for="website" class="form-label">الموقع الإلكتروني:</label>
                    <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $university->website) }}">
                    @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل البريد الإلكتروني --}}
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $university->email) }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل رقم الهاتف --}}
                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الهاتف:</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $university->phone) }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- حقل الوصف (textarea) --}}
                <div class="mb-3">
                    <label for="description" class="form-label">الوصف:</label>
                    {{-- المحتوى بين <textarea> و </textarea> --}}
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $university->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- زر الإرسال --}}
                <button type="submit" class="btn btn-primary">تعديل الجامعة</button>
                <a href="{{ route('super_admin.university.index') }}" class="btn btn-secondary ms-2">إلغاء</a>
            </form>
        </div>
    </div>
</div>
@endsection
