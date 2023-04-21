<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TbUnidadeNegocioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        [
            'id_uni_neg' => $this->id_uni_neg,
            'id_grupo_regiao ' => $this->id_grupo_regiao,
            'uni_neg' => $this->uni_neg,
            'cep' => $this->cep,
            'rua' => $this->rua,
            'complemento' => $this->complemento,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'horario_abertura ' => $this->horario_abertura,
            'horario_fechamento' => $this->horario_fechamento,
            'unid_neg_operacao' => $this->unid_neg_operacao,
            'horario_funcionamento' => $this->horario_funcionamento,
            'refeicao_a_partir_de' => $this->refeicao_a_partir_de,
        ];
    }
}
