<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return cursos::all();
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
        $cursos = new cursos();

        $cursos->materias = $request->materias;

        $cursos->save();

        return "se agrego la materia";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return cursos::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cursos = cursos::find($id);

        $cursos->materias = $request->materias;

        $cursos->save();

        return "se edito la materia";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cursos = cursos::find($id);

        $cursos->delete();

        return "se elimino la materia";
    }
}
