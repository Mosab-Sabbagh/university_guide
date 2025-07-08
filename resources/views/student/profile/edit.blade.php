@extends('student.layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4 p-4">
            <h3 class="mb-4 text-center">تعديل الملف الشخصي</h3>

            <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- صورة الملف مع الزر المدمج --}}
                <div class="mb-4 text-center position-relative" style="width: 160px; margin: auto;">
                    {{-- صورة المعاينة --}}
                    <img id="previewImage"
                        src="{{ $student->student->profile_image ? asset('storage/' . $student->student->profile_image) : asset('images/default-avatar.png') }}"
                        alt="الصورة الشخصية" class="rounded-circle img-thumbnail"
                        style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;">

                    {{-- الزر المدمج (أيقونة الكاميرا) --}}
                    <label for="profile_image"
                        class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-2"
                        style="cursor: pointer;">
                        <i class="fa fa-camera"></i>
                    </label>

                    {{-- الحقل الفعلي لرفع الصورة --}}
                    <input type="file" id="profile_image" name="profile_image" accept="image/*" class="d-none">
                </div>


                {{-- الاسم --}}
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}"
                        required>
                </div>

                {{-- البريد الإلكتروني --}}
                <div class="mb-4">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $student->email) }}" required>
                </div>

                {{-- المستوى الدراسي  --}}
                <div class="mb-4">
                    <label for="level" class="form-label">المستوى الدراسي</label>
                    <select name="level" id="level" class="form-control" required>
                        <option value="">اختر المستوى</option>
                        @foreach(['المستوى الأول', 'المستوى الثاني', 'المستوى الثالث', 'المستوى الرابع', 'المستوى الخامس', 'المستوى السادس'] as $level)
                            <option value="{{ $level }}" {{ old('level', $student->student->level ?? '') == $level ? 'selected' : '' }}>{{ $level }}</option>
                        @endforeach
                    </select>
                    @error('level') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-5">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('profile_image').addEventListener('change', function (e) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            if (e.target.files[0]) {
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
@endsection