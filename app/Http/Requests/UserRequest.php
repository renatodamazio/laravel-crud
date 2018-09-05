<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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


        public function rules()
        {
            return [
               'name' => 'required|max:60',
               'cpf' => 'required|unique:users,cpf,' . $this->id,
               'email' => 'required|unique:users,email,' . $this->id,
            ];
        }

    public function messages() {
        return [
            'name.required' => 'Preencha o campo Nome',
            'name.max' => 'Máximo 60 caracteres',
            'cpf.unique' => 'Este cpf já está registrado em nossa base de dados',
            'cpf.required' => 'Preencha o campo cpf',
            'email.unique' => 'Este email já está registrado em nossa base de dados',
            'email.required' => 'Preencha o campo e-mail',

        ];
    }
}
