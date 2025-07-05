@extends('auth.layouts.app')
@section('title', 'تسجيل الدخول')
    
@section('form')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <a href="{{ url('/') }}"><img src="{{asset('images/logo.png')}}" alt="شعار المنصة"
                style="width: 100px; height: auto; display: block; margin: 0 auto; margin-bottom: 20px;">
        </a>
        <h3 class="text-center mb-4" style="font-weight:700;">تسجيل الدخول</h3>
        <div class="mb-3">
            <input type="text" name="email" class="form-control" placeholder="البريد الإلكتروني"
                value="{{old('email')}}" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور"
                value="{{old('password')}}" required>
        </div>
        <div class="mb-3 d-flex align-items-center gap-2">
            <input type="checkbox" class="form-check-input m-0" id="remember_me" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label m-0" for="remember_me">تذكرني</label>
        </div>
        @if (Route::has('password.request'))
            <div class="mb-3 text-end">
                <a href="{{ route('password.request') }}" class="text-decoration-underline text-secondary"
                    style="font-size: 0.95rem;">
                    نسيت كلمة المرور؟
                </a>
            </div>
        @endif
        <button type="submit" class="btn btn-success btn-sm register-btn">دخول</button>
        <div class="mt-3 text-center">
            <p>ليس لديك حساب؟ <a href="{{route('register')}}" class="text-primary">تسجيل جديد</a></p>
        </div>
    </form>
@endsection

