<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TbEscalacaoClienteResource extends JsonResource
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
            //'id' => $this->id,
            'cliente' => $this->cliente,
            'loja' => $this->loja,
            //'camera_id' => $this->camera_id,
            'data_escalacao' => $this->data_escalacao,
            'horario' => $this->horario,
            //'qtde_operadores_escalados' => $this->qtde_operadores_escalados,
            'qtde_pessoas_entrada' => $this->qtde_pessoas_entrada,
            //'qtde_pessoas_saida' => $this->qtde_pessoas_saida,
            'qtde_clientes_individual_entrada' => $this->qtde_clientes_individual_entrada, // descomentar na api obx
            //'qtde_clientes_individual_saida' => $this->qtde_clientes_individual_saida,
            //'qtde_pessoas_grupo_entrada' => $this->qtde_pessoas_grupo_entrada, //comentar na api obx
            //'qtde_pessoas_grupo_saida' => $this->qtde_pessoas_grupo_saida,
            'qtde_clientes_por_grupo_entrada' => $this->qtde_clientes_por_grupo_entrada, // descomentar na api obx
            //'qtde_clientes_por_grupo_saida' => $this->qtde_clientes_por_grupo_saida,
            'qtde_grupo_entrada' => $this->qtde_grupo_entrada,  // descomentar na api obx
            //'qtde_grupo_saida' => $this->qtde_grupo_saida,
            'qtde_funcionarios_entrada' => $this->qtde_funcionarios_entrada,
            //'qtde_funcionarios_saida ' => $this->qtde_funcionarios_saida,
            'entrada' => $this->entrada,
            //'saida' => $this->saida,
            //'total_clientes_compradores_entrada' => $this->total_clientes_compradores_entrada,
            //'clientes_compradores_caixa' => $this->clientes_compradores_caixa,
            //'clientes_atendidos_caixa' => $this->clientes_atendidos_caixa,
            //'media_clientes_compradores_caixa' => $this->media_clientes_compradores_caixa,
            //'qtde_caixas' => $this->qtde_caixas,
        ];
    }
}
