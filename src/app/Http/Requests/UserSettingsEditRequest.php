<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsEditRequest extends FormRequest
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
        $rules = [];

        // Проверяем, было ли изменено поле 'name'
        if ($this->filled('name')) {
            $rules['name'] = ['string', 'max:40', 'min:4', 'unique:users,name,' . $this->user->id];
        }

        // Проверяем, было ли изменено поле 'contact_link'
        if ($this->filled('contact_link')) {
            $rules['contact_link'] = ['nullable', 'string', 'max:50', 'min:4', 'unique:users,contact_link,' . $this->user->id];
        }

        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 40 символов.',
            'name.min' => 'Имя должно быть больше 4 символов',
            'name.unique' => 'Это имя уже занято.',

            'contact_link.string' => 'Контактная ссылка должна быть строкой.',
            'contact_link.max' => 'Контактная ссылка не должна превышать 50 символов.',
            'contact_link.min' => 'Контактная ссылка должна быть больше 4 символов',
            'contact_link.unique' => 'Эта контактная ссылка уже занята.',
        ];
    }

}
