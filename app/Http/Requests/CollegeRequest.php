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
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:50',
            'description' => 'nullable|string',
            'universities' => 'nullable|array',
            'universities.*' => 'exists:universities,id',
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
            'name_ar.required' => 'الاسم العربي مطلوب.',
            'name_en.required' => 'الاسم الإنجليزي مطلوب.',
            'abbreviation.required' => 'الاختصار مطلوب.',
        ];
    }
}
