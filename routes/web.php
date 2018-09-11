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

Route::get('/', function () {
    return view('index');
});
//PARA A APP
Route::group(array('prefix' => 'api'), function() {
	Route::resource('alunos', 'AlunoAPIController');
	Route::resource('avisos', 'AvisoAPIController');
	Route::resource('anos', 'AnoAPIController');
	Route::resource('disciplinas', 'DisciplinaAPIController');
	Route::resource('estagios', 'EstagioAPIController');
	Route::resource('professores', 'ProfessorAPIController');
	Route::resource('horarios', 'HorarioAPIController');
	Route::resource('documentos', 'DocumentoAPIController');
});

//PARA A WEB
Route::group(array('prefix' => 'web'), function() {
	Route::get('/', 'PageController@index')->name("index");
	Route::resource('aluno', 'AlunoController');
	Route::resource('aviso', 'AvisoController');
	Route::resource('ano', 'AnoController');
	Route::resource('disciplina', 'DisciplinaController');
	Route::resource('estagio', 'EstagioController');
	Route::resource('professor', 'ProfessorController');
	Route::resource('horario', 'HorarioController');
	Route::resource('documento', 'DocumentoController');
	Route::get("creditos", "PageController@credito")->name("creditos");
});
Auth::routes();
Route::get('/home', 'HomeController@index');