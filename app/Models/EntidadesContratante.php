<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadesContratante extends Model
{
    use HasFactory;

    protected $fillable = [
        "RUC",
        "entidad_contratante",
        "nomenclatura",
        "estado"
    ];
}
