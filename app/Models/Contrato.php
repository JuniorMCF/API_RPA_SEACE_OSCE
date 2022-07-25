<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        "postor",
        "mype",
        "ley_promocion_de_selva",
        "bonificacion_colindante",
        "cantidad_adjudicada",
        "monto_adjudicado",
        "nomenclatura",
        "estado"
    ];
}
