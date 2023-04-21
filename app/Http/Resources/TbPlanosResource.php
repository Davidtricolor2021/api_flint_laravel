<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TbPlanosResource extends JsonResource
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
            'id' => $this->id,
            'nome' => $this->nome,
            'grao' => $this->grao,
            'n_request' => $this->n_request,
        ];
    }
}
