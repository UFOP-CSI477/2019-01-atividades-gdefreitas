<?php

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

$this->group(['middleware' => ['auth' , 'admin'], 'prefix' => 'administrador', 'namespace' => 'Administrador'] ,function(){
    Route::get('/home', 'HomeController@index')->name('home');
    $this->resource('procedures' , 'ProcedimentoController');
});

$this->group(['middleware' => ['auth' , 'oper'], 'prefix' => 'operador', 'namespace' => 'Operador'] ,function(){
    Route::get('/home', 'HomeController@index')->name('home');
    $this->get('/tests' , 'TestController@index') -> name('tests.index');
    $this->get('/procedures' , 'ProcedimentoController@index') -> name('procedure.index');
    $this->get('/procedures/{id}/edit' , 'ProcedimentoController@edit') -> name('procedure.edit');
    $this->patch('/procedures/{id}' , 'ProcedimentoController@update') -> name('procedure.update');
});

$this->group(['middleware' => ['auth' , 'pacient'], 'prefix' => 'paciente', 'namespace' => 'Paciente'] ,function(){
    Route::get('/home', 'HomeController@index')->name('home');
    $this->resource('test' , 'TestController');
});

$this->redirect('/' , '/home');
Route::get('/home', 'HomeController@index')->name('home');
$this->get('/areageral' , 'AreaGeralController@index') -> name('areageral.index');

Auth::routes();
