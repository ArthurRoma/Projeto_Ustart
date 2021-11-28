<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'locadora', 'where' =>['id' => '[0-9]+']], function () {
   
    Route::get('/criar', ['as' => 'locadora.criar', 'uses' => 'App\Http\Controllers\LocadoraController@criar']);
    Route::post('/inserir', ['as' => 'locadora.inserir', 'uses' => 'App\Http\Controllers\LocadoraController@inserir']);
    
    Route::get('{id}/editar', ['as' => 'locadora.editar', 'uses' => 'App\Http\Controllers\LocadoraController@editar']);
    Route::put('{id}/atualizar', ['as' => 'locadora.atualizar', 'uses' => 'App\Http\Controllers\LocadoraController@atualizar']);

    Route::delete('{id}/excluir', ['as' => 'locadora.excluir', 'uses' => 'App\Http\Controllers\locadoraController@excluir']);
});