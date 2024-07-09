<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.string' => 'Это поле должно быть строкой',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'Вы ввели неправильный формат email',
            'email.string' => 'Это поле должно быть строкой',
            'email.unique' => 'Пользователь с такми email уже существует',
            'role.required' => 'Это поле обязательно для заполнения',
            'role.integer' => 'Это поле должно быть числом',
        ];
    }
}
