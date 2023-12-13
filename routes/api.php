<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DocentesController;
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

Route::get('/alumnos', [AlumnosController::class,'index']);
Route::get('/alumnos/{id}', [AlumnosController::class,'show']);
Route::post('/alumnos', [AlumnosController::class,'store']);
Route::put('/alumnos/{id}', [AlumnosController::class,'update']);
Route::delete('/alumnos/{id}', [AlumnosController::class,'destroy']);

Route::get('/docentes', [DocentesController::class,'index']);
Route::get('/docentes/{id}', [DocentesController::class,'show']);
Route::post('/docentes', [DocentesController::class,'store']);
Route::put('/docentes/{id}', [DocentesController::class,'update']);
Route::delete('/docentes/{id}', [DocentesController::class,'destroy']);

Route::get('/cursos', [CursosController::class,'index']);
Route::get('/cursos/{id}', [CursosController::class,'show']);
Route::post('/cursos', [CursosController::class,'store']);
Route::put('/cursos/{id}', [CursosController::class,'update']);
Route::delete('/cursos/{id}', [CursosController::class,'destroy']);


Route::get('/matriculas', [MatriculaController::class,'index']);
Route::put('/matriculas/{id}', [MatriculaController::class,'update']);

