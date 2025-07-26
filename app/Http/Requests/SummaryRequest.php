<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SummaryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id'     => 'required|exists:courses,id',
            'title'   => 'required|string|min:10',
            'description'   => 'required|string|min:10',
            'file_path'  => 'required|file|mimes:pdf,docx|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'course_id.required'    => 'يجب اختيار المادة.',
            'course_id.exists'      => 'المادة المختارة غير موجودة.',

            'title.required'  => 'يرجى إدخال عنوان للملخص.',
            'title.min'       => 'عنوان يجب أن يكون على الأقل 10 أحرف.',

            'description.required'  => 'يرجى إدخال وصف للملخص.',
            'description.min'       => 'الوصف يجب أن يكون على الأقل 10 أحرف.',

            'file_path.required' => 'يرجى إرفاق ملف الملخص.',
            'file_path.file'     => 'يجب أن يكون المرفق ملفًا صالحًا.',
            'file_path.mimes'    => 'يجب أن يكون الملف من نوع PDF أو DOCX.',
            'file_path.max'      => 'الملف يجب ألا يتجاوز 2 ميجابايت.',
        ];
    }
}
