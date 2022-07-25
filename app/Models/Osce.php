<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osce extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre_sigla_entidad",
        "fecha_publicacion",
        "nomenclatura",
        "reiniciado_desde",
        "objeto_contratacion",
        "descripcion",
        "codigo_snip",
        "codigo_unico_inversion",
        "valor_estimado",
        "moneda",
        "version_seace",
        "acciones",
        "departamento",
        "estado"
    ];
}
