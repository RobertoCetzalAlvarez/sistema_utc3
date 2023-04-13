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
    }
    public function show($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
