<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
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
            'description' => 'required|string|max:2000',
            'is_free' => 'required|boolean',
            'price' => 'nullable|required_if:is_free,false|numeric|min:0|max:9999.99',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'حقل العنوان مطلوب.',
            'title.string' => 'يجب أن يكون العنوان نصًا.',
            'title.max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',

            'description.required' => 'حقل الوصف مطلوب.',
            'description.string' => 'يجب أن يكون الوصف نصًا.',
            'description.max' => 'يجب ألا يتجاوز الوصف 2000 حرفًا.',

            'is_free.required' => 'حقل نوع العرض مطلوب.',
            'is_free.boolean' => 'قيمة نوع العرض غير صالحة.',

            'price.required_if' => 'حقل السعر مطلوب عندما لا يكون العرض مجانيًا.',
            'price.numeric' => 'يجب أن يكون السعر رقمًا صحيحًا أو عشريًا.',
            'price.min' => 'يجب أن يكون السعر أكبر من أو يساوي الصفر.',
            'price.max' => 'يجب ألا يتجاوز السعر 9999.99 شيكل.',
        ];
    }
}
