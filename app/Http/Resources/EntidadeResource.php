<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EntidadeResource extends JsonResource
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
            "entidad_contratante" => $this->entidad_contratante,
            "direccion_legal" => $this->direccion_legal,
            "pagina_web" => $this->pagina_web,
            "telefono" => $this->telefono,
            "nomenclatura" => $this->nomenclatura,
            "estado" => $this->estado,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}
