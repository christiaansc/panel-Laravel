<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:3',
            'status' => 'required|boolean',
            'description' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido.',
            'name.string' => 'The name field must be a string.',
            'name.min' => 'The name field must be a string.',
            'status.boolean' => 'El campo status debe ser un valor booleano.',
            'status.required' => 'El campo status es requerido.',
        ];
    }
}
