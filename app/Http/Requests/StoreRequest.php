<?php

namespace App\Http\Requests;

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
            'name' => 'required|string|max:255|min:3',
            'phone' => 'required|numeric|digits_between:11,11|unique:schedules',
            'email' => 'required|email|unique:schedules,email',
            'cep' => 'required|digits_between:8,8|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Validation.name.required',
            'name.string' => 'Validation.name.string',
            'name.max' => 'Validation.name.max',
            'name.min' => 'Validation.name.min',

            'phone.required' => 'Validation.phone.required',
            'phone.numeric' => 'Validation.phone.numeric',
            'phone.unique' => 'Validation.phone.unique',
            'phone.digits_between' => 'Validation.phone.digits_between',

            'email.required' => 'Validation.email.required',
            'email.email' => 'Validation.email.email',
            'email.unique' => 'Validation.email.unique',

            'cep.required' => 'Validation.cep.required',
            'cep.digits_between' => 'Validation.cep.digits_between',
            'cep.numeric' => 'Validation.cep.numeric'
        ];
    }
}
