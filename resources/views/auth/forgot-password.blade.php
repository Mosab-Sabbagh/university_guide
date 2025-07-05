@extends('auth.layouts.app')
@section('title', 'إعادة تعيين كلمة المرور')

@section('form')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="شعار المنصة"
                style="width: 100px; height: auto; display: block; margin: 0 auto; margin-bottom: 20px;">
        </a>

        <h3 class="text-center mb-4" style="font-weight: 700;">إعادة تعيين كلمة المرور</h3>

        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-3 text-center text-muted" style="font-size: 0.95rem;">
            لا مشكلة، فقط أدخل بريدك الإلكتروني وسنرسل لك رابطًا لإعادة تعيين كلمة المرور.
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="text-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success btn-sm w-100">إرسال رابط إعادة التعيين</button>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}" class="text-primary">العودة لتسجيل الدخول</a>
        </div>
    </form>
@endsection