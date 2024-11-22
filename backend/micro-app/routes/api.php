<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\NotaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("appEstudiante")->group(function(){
    Route::controller(EstudianteController::class)->group(function(){
        Route::get("estudiantes", "index");
        Route::get("estudiante/{id}", "show");
        Route::post("estudiante", "store");
        Route::put("estudiante/{id}", "update");
        Route::delete("estudiante/{id}", "destroy");
    });
});
Route::prefix("appNota")->group(function(){
    Route::controller(NotaController::class)->group(function(){
        Route::get("notas", "index");
        Route::get("nota/{codEstudiante}", "show");
        Route::post("nota", "store");
        Route::put("nota/{codEstudiante}", "update");
        Route::delete("nota/{codEstudiante}", "destroy");
        Route::get('notas/estudiante/{codEstudiante}', [NotaController::class, 'notasPorEstudiante']);
    });
 
});