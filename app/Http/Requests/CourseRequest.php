<?php

namespace App\Http\Requests;

use App\Role\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->user_type === UserRole::STUDENT && Auth::user()->is_admin;
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
            'code' => 'required|string|max:100|unique:courses,code',
            'description' => 'required|string',
        ];
    }


    public function messages(): array
    {
        return [
            'name_ar.required' => 'الرجاء إدخال الاسم بالعربي.',
            'name_ar.string'   => 'الاسم بالعربي يجب أن يكون نصاً.',

            'name_en.required' => 'الرجاء إدخال الاسم بالإنجليزي.',
            'name_en.string'   => 'الاسم بالإنجليزي يجب أن يكون نصاً.',

            'code.required' => 'الرجاء إدخال الكود.',
            'code.string'   => 'الكود يجب أن يكون نصاً.',
            'code.unique'   => 'هذا الكود مستخدم من قبل، الرجاء إدخال كود فريد.',

            'description.required' => 'الرجاء إدخال الوصف.',
            'description.string'   => 'الوصف يجب أن يكون نصاً.',
        ];
    }
}
