<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TbUsuarioFormRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required',
            'usuario' => 'required',
            'senha' => 'required',
            'last_login' => 'required',
            'active' => 'required',
            'id_perfil' => 'required',
            'uni_neg_select' => 'required',
            //'limit_login' => 'required',
            'is_deleted' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => "O campo ':attribute' é obrigatório",
        ];
    }
}
