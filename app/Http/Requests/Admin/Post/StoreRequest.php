<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_img' => 'required|file',
            'main_img' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле обязательно для заполнения',
            'title.string' => 'Поле должно быть строкой',
            'content.required' => 'Поле обязательно для заполнения',
            'content.string' => 'Поле должно быть строкой',
            'preview_img.required' => 'Необходимо выбрать изображение',
            'preview_img.file' => 'Неверный тип файла',
            'main_img.required' => 'Необходимо выбрать изображение',
            'main_img.file' => 'Неверный тип файла',
            'category_id.required' => 'Поле обязательно для заполнения',
            'category_id.integer' => 'ID категории должно быть числом',
            'category_id.exists' => 'ID категории должен существовать',
            'tag_ids.array' => 'Необходимо отправлять массив данных',
        ];
    }
}
