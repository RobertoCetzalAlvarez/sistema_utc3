<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preinscripciones;

class apiPreinscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $pre=Preinscripciones::all();
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
        $pre=new Preinscripciones();
        $pre->id=$request->get('id');
        $pre->nombre=$request->get('nombre');
        $pre->ap_p=$request->get('ap_p');
        $pre->ap_m=$request->get('ap_m');
        $pre->curp=$request->get('curp');
        $pre->nns=$request->get('nns');
        $pre->localidad=$request->get('localidad');
        $pre->calle_int=$request->get('calle_int');
        $pre->calle_ex=$request->get('calle_ex');
        $pre->id_carrera=$request->get('id_carrera');
        $pre->id_salon=$request->get('id_salon');
        $pre->numero=$request->get('numero');

        $pre->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $pre=Preinscripciones::find($id);
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
        //
        $pre=Preinscripciones::find($id);
        
        $pre->id=$request->get('id');
        $pre->nombre=$request->get('nombre');
        $pre->ap_p=$request->get('ap_p');
        $pre->ap_m=$request->get('ap_m');
        $pre->curp=$request->get('curp');
        $pre->nns=$request->get('nns');
        $pre->localidad=$request->get('localidad');
        $pre->calle_int=$request->get('calle_int');
        $pre->calle_ex=$request->get('calle_ex');
        $pre->id_carrera=$request->get('id_carrera');
        $pre->id_salon=$request->get('id_salon');
        //$pre->numero=$request->get('numero');

        $pre->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
