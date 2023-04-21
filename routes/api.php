<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    // Rota para usuarios
    Route::get('usuarios', [App\Http\Controllers\TbUsuarioController::class, 'index']);
    Route::post('usuario', [App\Http\Controllers\TbUsuarioController::class, 'store']);
    Route::get('usuario/{id_usuario}', [App\Http\Controllers\TbUsuarioController::class, 'show']);
    Route::post('usuario/{id_usuario}', [App\Http\Controllers\TbUsuarioController::class, 'update']);
    Route::delete('usuario/{id_usuario}', [App\Http\Controllers\TbUsuarioController::class, 'destroy']); 

    // Rota para escalação cliente
    Route::get('escalacao_clientes', [App\Http\Controllers\TbEscalacaoClienteController::class, 'index']);
    Route::get('escalacao_cliente/{id}', [App\Http\Controllers\TbEscalacaoClienteController::class, 'show']);
    Route::get('clientes', [App\Http\Controllers\TbEscalacaoClienteController::class, 'retorno_grao'])
        ->middleware('throttle:grao');

    // Rota para unidade de negocio
    Route::get('lojas', [App\Http\Controllers\TbUnidadeNegocioController::class, 'index']);
    Route::get('loja/{id_uni_neg}', [App\Http\Controllers\TbUnidadeNegocioController::class, 'show']);

    // Rota para planos
    Route::get('planos', [App\Http\Controllers\TbPlanosController::class, 'index']);
    Route::post('plano', [App\Http\Controllers\TbPlanosController::class, 'store']);
    Route::get('plano/{id}', [App\Http\Controllers\TbPlanosController::class, 'show']);
    Route::post('plano/{id}', [App\Http\Controllers\TbPlanosController::class, 'update']);
    Route::delete('plano/{id}', [App\Http\Controllers\TbPlanosController::class, 'destroy']);
    
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});