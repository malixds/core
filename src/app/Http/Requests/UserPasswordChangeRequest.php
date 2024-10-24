<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordChangeRequest extends FormRequest
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
            'password' => ['required'],
            'new_password' => ['required', 'min:8'],
        ];
    }
    public function message(): array
    {
        return [
            'password.required' => 'Поле текущего пароля обязательно для заполнения.',
            'password.password' => 'Неправильный текущий пароль.',
            'new_password.required' => 'Поле нового пароля обязательно для заполнения.',
            'new_password.confirmed' => 'Пароли не совпадают.',
            'new_password.min' => 'Новый пароль должен содержать не менее 8 символов.',
        ];

    }
}
