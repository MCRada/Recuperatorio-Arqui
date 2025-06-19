<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Duracion',
        'Costo',
        'id_categoria',
        'Cod_curso',
        // 'Foto', // si usas este campo, descomenta
    ];
}
