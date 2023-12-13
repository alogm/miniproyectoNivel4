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
        $cursos = cursos::join('materias', 'cursos.materia_id', '=', 'materias.id')
        ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
        ->select('cursos.*', 'materias.materia as nombre_materia', 'docentes.nombre as nombre_docente', 'docentes.apellido as apellido_docente')
        ->get();

    return $cursos;
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
        $curso = cursos::with('materia', 'docente')->find($id);

        return $curso;
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
