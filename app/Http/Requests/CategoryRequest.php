<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'string' ],
            'slug' => ['required', 'string' ],

        ];
        if ($this->isMethod('post')) {
            $rules['name'][] = 'unique:categories';
            $rules['slug'][] = 'unique:categories';
        } elseif ($this->isMethod('put')) {
            $rules['name'][] = Rule::unique('categories')->ignore($this->route('category'));
            $rules['slug'][] = Rule::unique('categories')->ignore($this->route('category'));
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'slug.required' => 'Slug không được để trống',
            'name.string' => 'Tên danh mục phải là chuỗi',
            'slug.string' => 'Slug phải là chuỗi',
        ];
    }
}
