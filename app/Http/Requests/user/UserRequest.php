<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' =>'required|min:3',
            'email' =>'required|email|unique:users,email,'.Auth::user()->id,
            'password' =>'required|min:6|alpha_num',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe tener 3 carácteres',

            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser de tipo email',
            'email.unique' => 'El email ya ha sido registrado.',

            'password.required' => 'El password es requerido',
            'password.min' => 'El password debe tener 6 carácteres',
        ];
    }
}
