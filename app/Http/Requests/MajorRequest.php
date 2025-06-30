<?php

namespace App\Http\Requests;

use App\Role\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MajorRequest extends FormRequest
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
            'college_id'   => 'required|integer|exists:colleges,id',
            'name_ar'      => 'required|string|max:255',
            'name_en'      => 'required|string|max:255',
            'code'         => 'required|string|max:50|unique:majors,code',
            'description'  => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'college_id.required'   => 'حقل الكلية مطلوب.',
            'college_id.integer'    => 'يجب أن يكون معرف الكلية رقماً صحيحاً.',
            'college_id.exists'     => 'الكلية المحددة غير موجودة.',
            'name_ar.required'      => 'حقل الاسم بالعربية مطلوب.',
            'name_ar.string'        => 'يجب أن يكون الاسم بالعربية نصاً.',
            'name_ar.max'           => 'يجب ألا يزيد الاسم بالعربية عن 255 حرفاً.',
            'name_en.required'      => 'حقل الاسم بالإنجليزية مطلوب.',
            'name_en.string'        => 'يجب أن يكون الاسم بالإنجليزية نصاً.',
            'name_en.max'           => 'يجب ألا يزيد الاسم بالإنجليزية عن 255 حرفاً.',
            'code.required'         => 'حقل الرمز مطلوب.',
            'code.string'           => 'يجب أن يكون الرمز نصاً.',
            'code.max'              => 'يجب ألا يزيد الرمز عن 50 حرفاً.',
            'code.unique'           => 'هذا الرمز مستخدم بالفعل.',
            'description.string'    => 'يجب أن يكون الوصف نصاً.',
        ];
    }
}
