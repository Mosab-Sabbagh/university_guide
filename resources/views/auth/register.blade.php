<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: #f7fafd;
        }

        .register-card {
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
            max-width: 800px;
            margin: 40px auto;
            padding: 40px 32px 32px 32px;
            direction: rtl;
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            background: #f0f0f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
            font-size: 48px;
            color: #bdbdbd;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            margin-bottom: 16px;
            background: #f7fafd;
            border: 1px solid #e0e0e0;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .register-btn {
            width: 100%;
            border-radius: 10px;
            font-size: 1.2rem;
            padding: 10px 0;
        }

        .radio-group {
            display: flex;
            gap: 16px;
            align-items: center;
            margin-bottom: 16px;
        }

        .radio-group label {
            margin-bottom: 0;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="register-card">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="شعار المنصة"
                    style="width: 100px; height: auto; display: block; margin: 0 auto; margin-bottom: 20px;">
            </a>
            <h3 class="text-center mb-4" style="font-weight:700;">إنشاء حساب جديد</h3>

            <div class="profile-icon mb-3" id="profilePreview">
                <i class="fa fa-user"></i>
            </div>
            <div class="mb-3 text-center">
                <input type="file" name="profile_image" id="profileImageInput" accept="image/*" style="display:none;">
                <button type="button" class="btn btn-outline-secondary btn-sm"
                    onclick="document.getElementById('profileImageInput').click();">اختر صورة شخصية
                </button>
                @error('profile_image') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="اسم الطالب رباعي"
                        value="{{ old('name') }}">
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <select name="university_id" id="university_id" class="form-control">
                        <option value="">اختر الجامعة</option>
                        @foreach($universities as $university)
                            <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>
                                {{ $university->name_ar }}
                            </option>
                        @endforeach
                    </select>
                    @error('university_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <select name="college_id" id="college_id" class="form-control">
                        <option value="">اختر الكلية</option>
                    </select>
                    @error('college_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <select name="major_id" id="major_id" class="form-control">
                        <option value="">اختر التخصص</option>
                    </select>
                    @error('major_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <input type="text" name="student_number" class="form-control" placeholder="الرقم الجامعي"
                        value="{{ old('student_number') }}">
                    @error('student_number') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني"
                        value="{{ old('email') }}">
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <input type="date" name="enrollment_date" class="form-control" placeholder="تاريخ الالتحاق"
                        value="{{ old('enrollment_date') }}">
                    @error('enrollment_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <select name="level" class="form-control" required>
                        <option value="">اختر المستوى</option>
                        @foreach(['المستوى الأول', 'المستوى الثاني', 'المستوى الثالث', 'المستوى الرابع', 'المستوى الخامس', 'المستوى السادس'] as $level)
                            <option value="{{ $level }}" {{ old('level') == $level ? 'selected' : '' }}>{{ $level }}</option>
                        @endforeach
                    </select>
                    @error('level') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <input type="password" name="password" id="password" class="form-control" placeholder="كلمة المرور">
                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        placeholder="تأكيد كلمة المرور">
                </div>
            </div>

            <div id="password-error" class="text-danger mb-3" style="display:none;">كلمتا المرور غير متطابقتين</div>

            <button type="submit" class="btn btn-success register-btn">تسجيل</button>
            <div class="mt-3 text-center">
                <p>هل لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="text-primary">تسجيل الدخول</a></p>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dependent-dropdowns.js') }}"></script>
<script>
    const input = document.getElementById('profileImageInput');
    const preview = document.getElementById('profilePreview');

    input.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="صورة الملف الشخصي" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>