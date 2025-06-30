<?php

namespace App\Http\Requests;

use App\Role\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CollegeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()?->user_type === UserRole::SUPER_ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'university_id' => 'required|integer|exists:universities,id',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:50',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'university_id.required' => 'حقل الجامعة مطلوب.',
            'university_id.integer' => 'يجب أن يكون معرف الجامعة رقمًا صحيحًا.',
            'university_id.exists' => 'الجامعة المحددة غير موجودة.',
            'name_ar.required' => 'الاسم العربي مطلوب.',
            'name_en.required' => 'الاسم الإنجليزي مطلوب.',
            'abbreviation.required' => 'الاختصار مطلوب.',
        ];
    }
}
