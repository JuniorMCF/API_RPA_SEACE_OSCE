<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;

    protected $fillable = [
        "etapa",
        "fecha_inicio",
        "fecha_fin",
        "nomenclatura",
        "estado"
    ];
}
