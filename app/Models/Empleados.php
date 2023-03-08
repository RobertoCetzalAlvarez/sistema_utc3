<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    // use HasFactory;

    protected $table='empleados';

    protected $primaryKey='num_empleado';

    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'ap_p',
        'ap_m',
    ];
}
