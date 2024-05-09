<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
            'name' => 'required|string|max:200',
            'type' => 'required',
            'base' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Please input your name',
            'type.required' => 'Please Select your Pizza type',
            'base.required' => 'Please Select your Pizza base',
        ];
    }
}
