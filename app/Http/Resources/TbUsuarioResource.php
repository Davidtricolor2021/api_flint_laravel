<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TbUsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_usuario' => $this->id_usuario,
            'nome' => $this->nome,
            'email' => $this->email,
            'usuario' => $this->usuario,
            'senha' => $this->senha,
            'ip_address' => $this->ip_address,
            'activation_code' => $this->activation_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'forgotten_password_code' => $this->forgotten_password_code,
            'last_login' => $this->last_login,
            'active' => $this->active,
            'id_perfil ' => $this->id_perfil ,
            'uni_neg_select' => $this->uni_neg_select,
            //'limit_login' => $this->limit_login,
            'is_deleted' => $this->is_deleted,
        ];
    }
}
