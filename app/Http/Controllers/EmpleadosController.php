<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $empleados=Empleados::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $empleados=new Empleados();

        $empleados->nombre=$request->get('nombre');
        $empleados->ap_p=$request->get('ap_p');
        $empleados->ap_m=$request->get('ap_m');

        $empleados->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $empleados=Empleados::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleados=Empleados::find($id);

        $empleados->nombre=$request->get('nombre');
        $empleados->ap_p=$request->get('ap_p');
        $empleados->ap_m=$request->get('ap_m');

        $empleados->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleados=Empleados::find($id);

        $empleados->delete();
    }
}
