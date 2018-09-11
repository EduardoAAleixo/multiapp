<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Estagio;
use App\Ano;

class EstagioController extends Controller
{

    //INDEX
    public function index() {

      $estagios = Estagio::all();

      foreach($estagios as $estagio) {
        $estagio->ano = Ano::find($estagio->ano);
      }

      if (is_null($estagios)) {
        return redirect()->route("index")->withErrors("Erro ao carregar Estágios, tente novamente!");
      }

      else {
        return view("estagios.index", compact("estagios"));
      }
    }

   	//CREATE
    public function create() {

      $anos = Ano::all();

      return view("estagios.create", compact("anos"));
    }

    //STORE
    public function store(Request $dados) {

      $estagio = Estagio::create($dados->all());

      foreach($dados->ano as $ano) {
        $estagio->anos()->attach($ano);
      }

      if (is_null($estagio)) {
        return redirect()->route("estagio.index")->withErrors("Erro ao criar Estágio, tente novamente!");
      }

      else {
        return redirect()->route("estagio.index")->with("Estágio criado com sucesso!");
      }
    }

   	//SHOW
    public function show($id) {

      $estagio = Estagio::findOrFail($id);

      $estagio->ano = Ano::find($estagio->ano);

      if (is_null($estagio)) {
        return redirect("estagio.index")->withErrors("Erro ao carregar Estágio, tente novamente!");
      }

      else {
        return view("estagios.item", compact("estagio"));
      }
    }


   	//EDIT
      public function edit($id) {

      $estagio = Estagio::findOrFail($id);

      if (is_null($estagio)) {
        return redirect()->route("estagio.index")->withErrors("Erro ao carregar Estágio, tente novamente!");
      }

      else {

        $anos = Ano::all();

        return view("estagios.edit", compact("estagio", "anos"));
      }
    }

   	//UPDATE
    public function update(Request $dados, $id) {

      $estagio = Estagio::findOrFail($id);

      if (is_null($estagio)) {
        return redirect()->route("estagio.index")->withErrors("Erro ao carregar Estágio, tente novamente!");
      }

      else {

        $dados_estagio = $dados->all();

        $estagio->fill($dados_estagio)->save();

        return redirect()->route("estagio.index")->with("flash_message", "Estágio atualizado com sucesso!");
      }
    }

   	//DESTROY
    public function destroy($id) {

      $estagio = Estagio::findOrFail($id);

      if (is_null($estagio)) {
        return redirect()->route("estagio.index")->withErrors("Erro ao eliminar Estágio, tente novamente!");
      }

      else {

        $estagio->delete();

        return redirect()->route("estagio.index")->with("flash_message", "Estágio eliminado com sucesso!");
      }
    }
}
