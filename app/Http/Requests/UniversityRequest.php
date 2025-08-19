<?php

namespace App\Http\Requests;

use App\Role\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UniversityRequest extends FormRequest
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
            'abbreviation' => 'nullable|string|max:50',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'city' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
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
            'name_ar.required' => 'حقل الاسم بالعربية مطلوب',
            'name_ar.string' => 'حقل الاسم بالعربية يجب أن يكون نصاً',
            'name_ar.max' => 'حقل الاسم بالعربية يجب ألا يتجاوز 255 حرفاً',

            'name_en.required' => 'حقل الاسم بالإنجليزية مطلوب',
            'name_en.string' => 'حقل الاسم بالإنجليزية يجب أن يكون نصاً',
            'name_en.max' => 'حقل الاسم بالإنجليزية يجب ألا يتجاوز 255 حرفاً',

            'abbreviation.string' => 'حقل الاختصار يجب أن يكون نصاً',
            'abbreviation.max' => 'حقل الاختصار يجب ألا يتجاوز 50 حرفاً',

            'city.required' => 'حقل المدينة مطلوب',
            'city.string' => 'حقل المدينة يجب أن يكون نصاً',
            'city.max' => 'حقل المدينة يجب ألا يتجاوز 255 حرفاً',

            'address.string' => 'حقل العنوان يجب أن يكون نصاً',
            'address.max' => 'حقل العنوان يجب ألا يتجاوز 255 حرفاً',

            'website.string' => 'حقل الموقع الإلكتروني يجب أن يكون نصاً',
            'website.max' => 'حقل الموقع الإلكتروني يجب ألا يتجاوز 255 حرفاً',

            'email.email' => 'حقل البريد الإلكتروني يجب أن يكون بريداً إلكترونياً صحيحاً',
            'email.max' => 'حقل البريد الإلكتروني يجب ألا يتجاوز 255 حرفاً',

            'phone.string' => 'حقل الهاتف يجب أن يكون نصاً',
            'phone.max' => 'حقل الهاتف يجب ألا يتجاوز 20 حرفاً',

            'description.string' => 'حقل الوصف يجب أن يكون نصاً',

        ];
    }

}
