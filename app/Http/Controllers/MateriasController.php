<?php

namespace App\Http\Controllers;

use App\Models\materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return materias::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materia = new materias();

        $materia->materia = $request->materia;

        $materia->save();

        return "se agrego nueva materia";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return materias::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(materias $materias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
     $materia = materias::find($id);

      $materia->materia = $request->materia;

      $materia->save();

      return "se edito nueva materia";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materia = materias::find($id);

        $materia->cursos()->detach();

        $materia->delete();

        return "se elimino la materia";
    }
}
