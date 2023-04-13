<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
   // use HasFactory;
    // se define la tabla que se va a usar
    protected $table='carreras';
    //se define la llave primaria de la tabla
    protected $primaryKey='id';
    //se define como verdadero que 
    //es auto incrementable la llave primaria
    public $incrementing=false;
    //se define si se va a usar el tiempo 
    public $timestamps=false;
    //se declara los componentes de la tabla 
    protected $fillable=[
        'id',
        'carrera',
        
    ];
}
