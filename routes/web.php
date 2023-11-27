<?php

use App\Http\Controllers\autorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [autorController::class, 'index']);
Route::post('/guardarAutor', [autorController::class, 'saveAutor']);
Route::post('/guardarLibro', [autorController::class, 'saveLibro']);
Route::get('/datos', [autorController::class, 'mostrar']);
Route::delete('/datos/{id}', [autorController::class, 'eliminar']);
Route::put('/actualizarLibro/{id}', [autorController::class, 'actualizar']);
Route::Put('/actualizar/{id}', [autorController::class, 'updateLibro']);
Route::get('/filtrar', [autorController::class, 'filtrar']);