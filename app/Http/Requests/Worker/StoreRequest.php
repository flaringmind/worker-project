<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'age' => 'nullable|integer',
            'description' => 'nullable|string',
            'is_married' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Поле "Имя" не должно быть пустым',
            'first_name.string' => 'Поле "Имя" должно быть строкой',
            'last_name.required' => 'Поле "Фамилия" не должно быть пустым',
            'last_name.string' => 'Поле "Фамилия" должно быть строкой',
            'email.required' => 'Вам необходимо ввести адрес электронной почты',
            'email.email' => 'Адрес электронной почты имеет некорректный формат',
            'age.integer' => 'Возраст должен быть указан в формате числа',
            'description.string' => 'Описание должно быть указано в формате строки',
        ];
    }
}
