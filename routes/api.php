<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\MatriculaController;
use App\Models\cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos', [AlumnosController::class,'index']); //Se pueden ver todos los datos del alumnos y el curso que toman
Route::get('/alumnos/{id}', [AlumnosController::class,'show']);  //Se ve el alumno con el curso que esta tomando 
Route::post('/alumnos', [AlumnosController::class,'store']); //se puede agregar un alumno junto cpon el curso
Route::put('/alumnos/{id}', [AlumnosController::class,'update']); // sepuede editar al alumno y cambiar el curso 
Route::delete('/alumnos/{id}', [AlumnosController::class,'destroy']); // elimina al alumno no hay problema con la foreing

Route::get('/docentes', [DocentesController::class,'index']); // se puede ver a a todos los docente y el curso imparte
Route::get('/docentes/{id}', [DocentesController::class,'show']); // se puede ver al docente y el curso que da 
Route::post('/docentes', [DocentesController::class,'store']); // agrega a un docente, junto con el curso que va a dar o si es necesario solo agrega al docente
Route::put('/docentes/{id}', [DocentesController::class,'update']);// edita al docente y se puede cambiar de curso que imparte
Route::delete('/docentes/{id}', [DocentesController::class,'destroy']);// se úede eliminar al docente sin problema 

Route::get('/cursos', [CursosController::class,'index']);// se puede ver todos los cursos, materia y docente que la da
Route::get('/cursos/{id}', [CursosController::class,'show']);// se puede ver el curso, el nombre de la materia y el nombre del docente 

Route::get('/materias', [MateriasController::class,'index']);// se muestran todas las materias
Route::get('/materias/{id}', [MateriasController::class,'show']);// se muestra la materia por id
Route::post('/materias', [MateriasController::class,'store']);// solo agrega nuevas materias
Route::put('/materias/{id}', [MateriasController::class,'update']);// solo actualiza materias
Route::delete('/materias/{id}', [MateriasController::class,'destroy']);// 

Route::get('/matriculas', [MatriculaController::class,'index']);// se puede ver todos los alumnos junto con su asistencia y la clase que toman 
Route::get('/matriculas/{id}', [MatriculaController::class,'show']);// se puede ver a uno solo alumnos junto con su asistencia y la clase que toman 
Route::put('/matriculas/{id}', [MatriculaController::class,'update']); // me actualiza la asistencia y su fecha pero actualiza no crea un nueva 


//para agregar un nuevo alumno con el curso es "curso_id": 
//para agregar un nuevo docente con su materia es "materia_id":
//para agregar una nueva materia es "materia":
//para modificar la aistencia y la fecha es en matricula y  es con "asistencia": y "fecha":