<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraduadoController;

Route::prefix('/graduados')->group(function () {
    Route::get('/', [GraduadoController::class, 'obtenerGraduadosConFiltros'])->middleware('auth.optional');
    Route::get('/filtros', [GraduadoController::class, 'obtenerValoresParaFiltrar']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [GraduadoController::class, 'registrarNuevoGraduado']);
        Route::put('/', [GraduadoController::class, 'actualizarDatosGraduado']);
        Route::get('/perfil', [GraduadoController::class, 'obtenerDatosPersonales']);
        Route::get('/enumerados', [GraduadoController::class, 'obtenerEnumerados']);
    });
    Route::middleware(['auth:sanctum', 'rol:admin'])->group(function () {
        Route::get('/validar', [GraduadoController::class, 'obtenerGraduadosPorValidar']);
        Route::patch('/validar/aprobar/{id}', [GraduadoController::class, 'aprobarGraduado']);
        Route::delete('/validar/rechazar/{id}', [GraduadoController::class, 'rechazarGraduado']);
        Route::get('/exportar-excel', [GraduadoController::class, 'obtenerGraduadosPorFiltroExportarExcel']);
        Route::post('/importar', [GraduadoController::class, 'importarGraduadosCsv']);
    });
});