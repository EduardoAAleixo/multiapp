<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Professor;
use App\Disciplina;

class ProfessorController extends Controller
{   
  //INDEX
  public function index() {

    $professores = Professor::all();

    foreach ($professores as $professor) {
      $professor->disciplina = Disciplina::find($professor->disciplina);
    }

    if (is_null($professores)) {
      return redirect()->route("index")->withErrors("Erro ao carregar Professores, tente novamente!");
    }

    else {
      return view("professores.index", compact("professores"));
    }
 }

  //CREATE
  public function create() {

      $disciplinas = Disciplina::all();

      return view("professores.create", compact("disciplinas"));
    }

    //STORE

   	public function store(Request $dados) {

      $professor = Professor::create($dados->all());

      foreach ($dados->disciplina as $disciplina) {
        $professor->disciplinas()->attach($disciplina);
      }

      if (is_null($professor)) {
        return redirect()->route("professor.index")->withErrors("Erro ao criar Professor, tente novamente!");
      }

      else {
        return redirect()->route("professor.index")->with("Professor criado com sucesso!");
      }
    }

   	//SHOW

   	public function show($id) {

      $professor = Professor::findOrFail($id);

      $professor->disciplina = Disciplina::find($professor->disciplina);

      if (is_null($professor)) {
        return redirect()->route("professor.index")->withErrors("Erro ao carregar Professor, tente novamente!");
      }

      else {
        return view("professores.item", compact("professor"));
      }
    }

   	//EDIT

   	public function edit($id) {

      $professor = Professor::findOrFail($id);

      if (is_null($professor)) {
        return redirect()->route("professor.index")->withErrors("Erro ao carregar Professor, tente novamente!");
      }

      else {

        $disciplinas = Disciplina::all();

        return view("professores.edit", compact("professor", "disciplinas"));
      }
    }

   	//UPDATE

   	public function update(Request $dados, $id) {

      $professor = Professor::findOrFail($id);

      if (is_null($professor)) {
        return redirect()->route("professor.index")->withErrors("Erro ao carregar Professor, tente novamente!");
      }

      else {

        $dados_professor = $dados->all();

        $professor->fill($dados_professor)->save();

        return view("professores.index")->with("flash_message", "Professor atualizado com sucesso!");
      }
    }

   	//DESTROY

   	public function destroy($id) {

      $professor = Professor::findOrFail($id);

      if (is_null($professor)) {
        return redirect()-route("professor.index")->withErrors("Erro a eliminar Professor, tente novamente!");
      }

      else {

        $professor -> delete();

        return redirect()->route("professor.index")->with("flash_message", "Professor eliminado com sucesso!");
      }
    }
}
