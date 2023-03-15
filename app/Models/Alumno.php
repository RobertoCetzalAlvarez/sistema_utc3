<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //use HasFactory;
    protected $table = 'alumnos';
    protected $primaryKey='id_matricula';

    public $incrementing=true;
    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'ap_p',
        'ap_m',
        'curp',
        'nns',
        'localidad',
        'calle_int',
        'calle_ex',
        'id_carrera',
        'id_salon',
    ];
}
