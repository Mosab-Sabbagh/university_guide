<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpRequestCommentRequest extends FormRequest
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
            'content' => 'required|string',
            'file' => 'nullable|file|max:10240', 
        ];  
    }

    public function messages(): array
    {
        return [
            'content.required' => 'المحتوى مطلوب.',
            'content.string' => 'يجب أن يكون المحتوى نصاً.',
            'file.file' => 'يجب أن يكون الملف صالحاً.',
            'file.max' => 'يجب ألا يزيد حجم الملف عن 10 ميجابايت.',
        ];
    }
}
