<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpRequestRequest extends FormRequest
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
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ];
    }
    /**
     * Get the custom messages for the validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [    
            'title.required' => 'العنوان مطلوب.',
            'title.string' => 'يجب أن يكون العنوان نصاً.',
            'title.max' => 'يجب ألا يزيد العنوان عن 255 حرفاً.',
            'content.required' => 'المحتوى مطلوب.',
            'content.string' => 'يجب أن يكون المحتوى نصاً.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.max' => 'يجب ألا يزيد حجم الصورة عن 2048 كيلوبايت.',
        ];
    }
}
