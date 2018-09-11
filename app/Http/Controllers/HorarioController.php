<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Horario;
use App\Disciplina;

class HorarioController extends Controller
{

  //INDEX
  public function index() {

    $horarios = Horario::all();

    foreach($horarios as $horario) {

      $horario->disciplina = Disciplina::find($horario->disciplina);
    }

    if (is_null($horarios)) {
      return redirect()->route("index")->withErrors("Erro ao carregar Horários, tente mais tarde!");
    }

    else {
      return view("horarios.index", compact("horarios"));
    }
  }

 	//CREATE
  public function create() {

    $disciplinas = Disciplina::all();

    return view("horarios.create", compact("disciplinas"));
  }

  //STORE
  public function store(Request $dados) {

    $horario = Horario::create($dados->all());

    foreach ($dados->disciplina as $disciplina) {
      $horario->disciplinas()->attach($disciplina);
    }

    if (is_null($horario)) {
      return redirect()->route("horario.index")->withErrors("Erro ao criar Horário, tente novamente!");
    }

    else {
      return redirect()->route("horario.index")->with("Horário criado com sucesso!");
    }
  }

 	//SHOW
  public function show($id) {

    $horario = Horario::findOrFail($id);

    $horario->disciplina = Disciplina::find($horario->disciplina);

    if (is_null($horario)) {
      return redirect()->route("horario.index")->withErrors("Erro ao carregar Horário, tente novamente!");
    }

    else {
      return view("horarios.item", compact("horario"));
    }
  }

 	//EDIT
  public function edit($id) {

    $horario = Horario::findOrFail($id);

    if (is_null($horario)) {
      return redirect()->route("horario.index")->withErrors("Erro ao carregar Horário, tente novamente!");
    }

    else {

      $disciplinas = Disciplina::all();

      return view("horarios.edit", compact("horario", "disciplinas"));
    }
  }

 	//UPDATE
  public function update(Request $dados, $id) {

    $horario = Horario::findOrFail($id);

    if (is_null($horario)) {
      return redirect()->route("horario.index")->withErrors("Erro a carregar Horário, tente novamente!");
    }

    else {

      $dados_horario = $dados->all();

      $horario->fill($dados_horario)->save();

      return redirect()->route("horario.index")->with("flash_message", "Horário atualizado com sucesso!");
    }
  }

 	//DESTROY
  public function destroy($id) {

    $horario = Horario::findOrFail($id);

    if (is_null($horario)) {
      return redirect()->route("horario.index")->withErrors("flash_message", "Erro ao eliminar Horário, tente novamente!");
    }

    else {

      $horario -> delete();

      return redirect()->route("horario.index")->with("flash_message", "Horário eleiminado com sucesso!");
    }
  }
}
