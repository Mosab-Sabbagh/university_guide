<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- University -->
        <div class="mt-4">
            <x-input-label for="university_id" value="الجامعة" />
            <select name="university_id" id="university_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            <option value="">اختر الجامعة</option>
            @foreach($universities as $university)
                <option value="{{ $university->id }}">{{ $university->name_ar }}</option>
            @endforeach
            </select>
            <x-input-error :messages="$errors->get('university_id')" class="mt-2" />
        </div>

        <!-- College -->
        <div class="mt-4">
            <x-input-label for="college_id" value="الكلية" />
            <select name="college_id" id="college_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            <option value="">اختر الكلية</option>
            </select>
            <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
        </div>

        <!-- Major -->
        <div class="mt-4">
            <x-input-label for="major_id" value="التخصص" />
            <select name="major_id" id="major_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            <option value="">اختر التخصص</option>
            </select>
            <x-input-error :messages="$errors->get('major_id')" class="mt-2" />
        </div>

        <!-- Student Number -->
        <div class="mt-4">
            <x-input-label for="student_number" value="رقم الطالب" />
            <x-text-input id="student_number" class="block mt-1 w-full" type="text" name="student_number" :value="old('student_number')" required />
            <x-input-error :messages="$errors->get('student_number')" class="mt-2" />
        </div>

        <!-- Enrollment Date -->
        <div class="mt-4">
            <x-input-label for="enrollment_date" value="تاريخ الالتحاق" />
            <x-text-input id="enrollment_date" class="block mt-1 w-full" type="date" name="enrollment_date" :value="old('enrollment_date')" required />
            <x-input-error :messages="$errors->get('enrollment_date')" class="mt-2" />
        </div>

        <!-- Level -->
        <div class="mt-4">
            <x-input-label for="level" value="المستوى" />
            <select id="level" name="level" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
            <option value="">اختر المستوى</option>
            <option value="المستوى الأول" {{ old('level') == 'المستوى الأول' ? 'selected' : '' }}>المستوى الأول</option>
            <option value="المستوى الثاني" {{ old('level') == 'المستوى الثاني' ? 'selected' : '' }}>المستوى الثاني</option>
            <option value="المستوى الثالث" {{ old('level') == 'المستوى الثالث' ? 'selected' : '' }}>المستوى الثالث</option>
            <option value="المستوى الرابع" {{ old('level') == 'المستوى الرابع' ? 'selected' : '' }}>المستوى الرابع</option>
            <option value="المستوى الخامس" {{ old('level') == 'المستوى الخامس' ? 'selected' : '' }}>المستوى الخامس</option>
            <option value="المستوى السادس" {{ old('level') == 'المستوى السادس' ? 'selected' : '' }}>المستوى السادس</option>
            </select>
            <x-input-error :messages="$errors->get('level')" class="mt-2" />
        </div>

        <!-- Profile Image -->
        <div class="mt-4">
            <x-input-label for="profile_image" value="صورة الملف الشخصي" />
            <x-text-input id="profile_image" class="block mt-1 w-full" type="file" name="profile_image" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dependent-dropdowns.js') }}"></script>
