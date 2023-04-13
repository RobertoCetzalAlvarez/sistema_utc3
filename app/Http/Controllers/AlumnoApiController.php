<?php


namespace App\Http\Controllers;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoApiController extends Controller
{
    public function index()
    {
        return $alumnos=Alumno::all();
    }
    public function store(Request $request)
    {
        //
        $alumnos=new Alumno();
        $alumnos->nombre=$request->get('nombre');
        $alumnos->ap_p=$request->get('ap_p');
        $alumnos->ap_m=$request->get('ap_m');
        $alumnos->curp=$request->get('curp');
        $alumnos->nns=$request->get('nns');
        $alumnos->localidad=$request->get('localidad');
        $alumnos->calle_int=$request->get('calle_int');
        $alumnos->calle_ex=$request->get('calle_ex');
        $alumnos->id_carrera=$request->get('id_carrera');
        $alumnos->id_salon=$request->get('id_salon');

        $alumnos->save();
    }
    public function show($id)
    {
        //
        return $alumnos=Alumno::find($id);
    }
    public function update(Request $request, $id)
    {
        //
        $alumnos=Alumno::find($id);
        
        $alumnos->nombre=$request->get('nombre');
        $alumnos->ap_p=$request->get('ap_p');
        $alumnos->ap_m=$request->get('ap_m');
        $alumnos->curp=$request->get('curp');
        $alumnos->nns=$request->get('nns');
        $alumnos->localidad=$request->get('localidad');
        $alumnos->calle_int=$request->get('calle_int');
        $alumnos->calle_ex=$request->get('calle_ex');
        $alumnos->id_carrera=$request->get('id_carrera');
        $alumnos->id_salon=$request->get('id_salon');

        $alumnos->update();
    }
    public function destroy($id)
    {
        //
        $alumnos=Alumno::find($id);
        $alumnos->delete();
    }
}
