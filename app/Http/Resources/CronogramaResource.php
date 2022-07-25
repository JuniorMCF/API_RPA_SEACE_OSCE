<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CronogramaResource extends JsonResource
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
            "etapa"=>$this->etapa,
            "fecha_inicio"=>$this->fecha_inicio,
            "fecha_fin"=>$this->fecha_fin,
            "nomenclatura"=>$this->nomenclatura,
            "estado"=>$this->estado,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}
