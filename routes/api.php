<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaixasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('faixas',[FaixasController::class, 'index']);
Route::get('faixas/{id}',[FaixasController::class, 'mostrarFaixasPorId']);
Route::post('faixas', [FaixasController::class, 'criarFaixas']);
Route::put('faixas/{id}',[FaixasController::class,'alterarFaixas']);
Route::delete('faixas/{id}',[FaixasController::class ,'deletarPorId']);
Route::get('categoria', [FaixasController::class, 'mostrarTodasCategorias']);
Route::get('categoria/{id}',[FaixasController::class , 'mostrarCategoria']);
Route::post('categoria',[FaixasController::class, 'criarCategoria']);
Route::put('categoria/{id}', [FaixasController::class, 'alterarPorId']);
Route::delete('categoria/{id}', [FaixasController::class , 'destroy']);
