<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
        $rules =  [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'description' => ['required', 'string'],

        ];
        if ($this->isMethod('post')) {
            $rules['name'][] = 'unique:brands';
        } elseif ($this->isMethod('put')) {
            $rules['name'][] = Rule::unique('brands')->ignore($this->route('brand'));
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.unique' => 'Tên thương hiệu đã tồn tại',
            'name.string' => 'Tên thương hiệu phải là chuỗi',
            'description.required' => 'Mô tả không được để trống',
            'description.string' => 'Mô tả phải là chuỗi',
            'slug.required' => 'Slug không được để trống',
            'slug.string' => 'Slug phải là chuỗi',
        ];
    }
}
