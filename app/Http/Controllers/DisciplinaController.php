<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Disciplina;
use App\Aluno;
use App\Ano;
use App\Aviso;
use App\Horario;
use App\Professor; 

class DisciplinaController extends Controller
{
	//INDEX
  public function index() {

  	$disciplinas = Disciplina::all(); 

  	foreach ($disciplinas as $disciplina) {
  		$disciplina->aluno = Aluno::find($disciplina->aluno);
   		$disciplina->ano = Ano::find($disciplina->ano);
   		//$disciplina->professor = Professor::find($disciplina->professor);
   	}

   	if (is_null($disciplinas)) {
  		return redirect()->route("index")->withErrors("Erro ao carregar Discplinas, tente novamente!");
    }

  	else {
  		return view("disciplinas.index", compact("disciplinas"));
  	}
  }


  //CREATE
  public function create() {

    $anos = Ano::all();

   	return view("disciplinas.create", compact("anos"));
  }


  //STORE
  public function store(Request $dados) {

    $disciplina = Disciplina::create($dados->all());
      foreach ($dados->ano as $ano) {
         $disciplina->anos()->attach($ano);
    }

   	if (is_null($disciplina)) {
   		return redirect()->route("disciplina.index")->withErrors("Erro ao criar Disciplina, tente novamente!");
   	}

   	else {
   		return redirect()->route("disciplina.index")->with("Disciplina inserida com sucesso!");
   	}
   }

   //SHOW
  public function show($id) {

   	$disciplina = Disciplina::findOrFail($id);

   	$disciplina->aluno = Aluno::find($disciplina->aluno);
   	$disciplina->ano = Ano::find($disciplina->ano);
   	$disciplina->aviso = Aviso::find($disciplina->aviso);
   	$disciplina->horario = Horario::find($disciplina->horario);

   	if (is_null($disciplina)) {
   		return redirect()->route("disciplina.index")->withErrors("Erro ao carregar Disciplina, tente novamente!");
   	}

   	else {
   		return view("disciplinas.item", compact("disciplina"));
   	}
   }

	//EDIT
  public function edit($id) {

   	$disciplina = Disciplina::findOrFail($id);

   	if (is_null($disciplina)) {
   		return redirect()->route("disciplina.index")->withErrors("Erro ao carregar Disciplina, tente novamente!");
   	}

   	else {
   		return view("disciplinas.edit", compact("disciplina"));
   	}
  }

  //UPDATE
  public function update(Request $dados, $id) {

   	$disciplina = Disciplina::findOrFail($id);

   	if (is_null("$disciplina")) {
   		return redirect()->route("disciplina.index")->withErrors("Erro ao carregar Disciplina, tente novamente!");
   	}

   	else {
   		$dados_disciplina = $dados->all();
   		
      $disciplina->fill($dados_disciplina)->save();

   		return redirect()->route("disciplina.index")->with("flash_message", "Disciplina atualizada com sucesso!");
   	}
  }

   //DESTROY
  public function destroy($id) {

   	$disciplina = Disciplina::findOrFail($id);

   	if (is_null($disciplina)) {
   		return redirect()->route("disciplina.index")->withErrors("Erro ao eliminar Disciplina, tente novamente!");
   	}

   	else {
   		return redirect()->route("disciplina.index")->with("flash_message", "Disciplina eliminada com sucesso");
   	}
  }
}
