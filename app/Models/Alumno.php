<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //use HasFactory;
    // se llama a la tabla
    protected $table = 'alumnos';
    // se define la llave primaria
    protected $primaryKey='id_matricula';
    // se define con que tablas se va a relacionar
    protected $with=['carreras'];
    // el valor autoincrementable de la llave primaria
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
    public function carreras(){
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id');
     }
}
