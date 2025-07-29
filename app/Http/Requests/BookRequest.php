<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'required|file|mimes:pdf',
            'course_id' => 'required|exists:courses,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'يرجى إدخال عنوان الكتاب.',
            'file_path.required' => 'يرجى إدخال رابط الكتاب.',
            'file_path.url' => 'رابط الكتاب يجب أن يكون صالحًا.',
            'file_path.ends_with' => 'يجب أن يكون الملف بصيغة PDF.',
            'course_id.required' => 'يرجى اختيار المساق المرتبط.',
            'course_id.exists' => 'المساق المحدد غير موجود.',
            'description.required' => 'يرجى إدخال وصف للكتاب.',
        ];
    }
}
