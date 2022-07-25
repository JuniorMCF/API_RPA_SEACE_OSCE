<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContratoResource extends JsonResource
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
            "postor" => $this->postor,
            "mype" => $this->mype,
            "ley_promocion_de_selva" => $this->ley_promocion_de_selva,
            "bonificacion_colindante" => $this->bonificacion_colindante,
            "cantidad_adjudicada" => $this->cantidad_adjudicada,
            "monto_adjudicado" => $this->monto_adjudicado,
            "nomenclatura" => $this->nomenclatura,
            "estado" => $this->estado,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}
