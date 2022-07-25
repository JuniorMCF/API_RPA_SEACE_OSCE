<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    use HasFactory;

    protected $fillable = [
        "entidad_contratante",
        "direccion_legal",
        "pagina_web",
        "telefono",
        "nomenclatura",
        "estado"
    ];
}
