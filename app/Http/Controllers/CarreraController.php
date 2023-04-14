<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Carrra;
use App\Models\Carrera;

class CarreraController extends Controller
{
    public function index()
    {
        //
        return $carrera=Carrera::all();
    }
    public function store(Request $request)
    {
        //
        $carrera=new Carrera();
        $carrera->id=$request->get('id');
        $carrera->carrera=$request->get('carrera');
        $carrera->save();
    }
    public function show($id)
    {
        //return $carrera=Alumno::find($id);
        return $carrera=Carrera::find($id);
    }
    public function update(Request $request, $id)
    {
        //
        $carrera=Carrera::find($id);
        $carrera->id=$request->get('id');
        $carrera->carrera=$request->get('carrera');
        $carrera->update();
    }
    public function destroy($id)
    {
        //
        $carrera=Carrera::find($id);
        $carrera->delete();
    }
}
