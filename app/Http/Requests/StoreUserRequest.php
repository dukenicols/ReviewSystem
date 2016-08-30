<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
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
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|confirmed|min:6',
          'username' => 'required|unique:users',
        ];
    }

    public function messages()
    {
      return [
        'email.unique' => 'Ya existe una cuenta registrada con este correo.',
        'username.unique' => 'Vaya! Alguien ya ha tomado este.',
      ];
    }
}
