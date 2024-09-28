<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $table = "vacantes";
    // protected $fillable = array("*");
    protected $fillable = [
        'puesto',
        'descripcion',
        'foto',
        'vacD',
        'vacO',
        'id',
    ];
}

