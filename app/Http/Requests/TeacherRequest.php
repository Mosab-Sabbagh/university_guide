<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $teacherId = $this->route('teacher_id');
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,'. $teacherId,
            'biography' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:15',
            'course_ids' => 'nullable|array',
            'course_ids.*' => 'exists:courses,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا.',
            
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
            
            'biography.string' => 'يجب أن تكون السيرة الذاتية نصًا.',
            
            'profile_picture.image' => 'يجب أن يكون الملف صورة.',
            'profile_picture.mimes' => 'يجب أن تكون الصورة من نوع: jpeg, png, jpg, gif.',
            'profile_picture.max' => 'يجب ألا تتجاوز حجم الصورة 2 ميجابايت.',
            
            'phone.required' => 'حقل الهاتف مطلوب.',
            'phone.string' => 'يجب أن يكون الهاتف نصًا.',
            'phone.max' => 'يجب ألا يتجاوز الهاتف 15 حرفًا.',
            
            'course_ids.array' => 'يجب أن تكون المساقات مصفوفة.',
            'course_ids.*.exists' => 'واحد أو أكثر من المساقات المحددة غير موجود.',
        ];
    }
}