<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OsceResource extends JsonResource
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
            'nombre_sigla_entidad' => $this->nombre_sigla_entidad,
            'fecha_publicacion' => Carbon::parse($this->fecha_publicacion)->format('Y-m-d H:i:s'),
            'nomenclatura' => $this->nomenclatura,
            'reiniciado_desde' => $this->reiniciado_desde,
            'objeto_contratacion' => $this->objeto_contratacion,
            'codigo_snip' => $this->codigo_snip,
            'codigo_unico_inversion' => $this->codigo_unico_inversion,
            'valor_estimado' => $this->valor_estimado != "---" ? floatval(str_replace(',', '', $this->valor_estimado)) : 0.0,
            'moneda' => $this->moneda,
            'acciones' => $this->acciones,
            'departamento' => $this->departamento,
            'estado' => $this->estado,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}
