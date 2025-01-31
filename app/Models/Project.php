<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    protected $fillable = [
        'NombreProyecto',
        'Fuentefondos',
        'MontoPlanificado',
        'MontoPatrocinado',
        'MontoFondosPropios',
    ];

}
