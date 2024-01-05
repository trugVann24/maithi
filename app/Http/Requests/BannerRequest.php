<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'image' => ['required', 'image', 'max:2048'],

        ];
        if ($this->isMethod('post')) {
            $rules['title'][] = 'unique:banners';
        } elseif ($this->isMethod('put')) {
            $rules['title'][] = Rule::unique('banners')->ignore($this->route('banners'));
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'title.string' => 'Tiêu đề phải là chuỗi',
            'image.required' => 'Hình ảnh không được để trống',
            'image.image' => 'Không đúng định dạng hình ảnh',
            'image.max' => 'Hình ảnh không được vượt quá 2048kb',
        ];
    }
}
