<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\PdfController;

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

#Rotas#
Route::resources([
    'produtos'=>ProdutoController::class,
    'clientes'=>ClienteController::class,
    'pedidos'=>PedidoController::class
]);

Route::get('/detalhes-pedido/{id}', [PedidoProdutoController::class, 'details']);

Route::get('/detalhes-pedido/{id}/pdf', [PdfController::class, 'generatePDF']);