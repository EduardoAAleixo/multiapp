<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Aluno;
use App\Ano;
use App\Aviso;
use App\Disciplina;

class AnoController extends Controller
{

    //INDEX
    public function index() {
 
    	$anos = Ano::all();

    	foreach ($anos as $ano) {
    		$ano->aluno = Aluno::find($ano->aluno);
    		$ano->disciplina = Disciplina::find($ano->disciplina);
    		$ano->aviso = Aviso::find($ano->aviso);
    	}

    	if (is_null($anos)) {
    		return redirect()->route("index")->withErrors("Erro ao carregar Anos, tente novamente!");
    	}

    	else {
    		return view("anos.index", compact("anos"));
    	}

    }


    //CREATE
    public function create() {
    	
    	$disciplinas = Disciplina::all();

    	return view("anos.create", compact("disciplinas"));
    }


    //STORE
    public function store(Request $dados) {
    	
    	$ano = Ano::create($dados->all());

    	foreach ($dados->disciplina as $disciplina) {
    		$ano->disciplinas()->attach($disciplina);
    	}

    	if (is_null($ano)) {
    		return redirect()->route("ano.index")->withErros("Erro ao criar Ano, tente novamente!");
    	}

    	else {
    		return redirect()->route("ano.index")->with("Ano criado com sucesso!");
    	} 
    }


    //SHOW
    public function show($id) {

    	$ano = Ano::findOrFail($id);
    	$ano->aluno = Aluno::find($ano->aluno);
    	$ano->disciplina = Disciplina::find($ano->disciplina);
    	$ano->aviso = Aviso::find($ano->aviso);

    	if (is_null($ano)) {
    		return redirect()->route("ano.index")->withErros("Erro ao carregar Ano, tente novamente!");
    	}

    	else {
    		return view("anos.item", compact("ano"));
    	}
    }


    //EDIT
    public function edit($id) {

    	$ano = Ano::findOrFail($id);

    	if (is_null($ano)) {
    		return redirect()->route("ano.index")->withErrors("Erro ao carregar Ano, tente novamente!");
    	}

    	else {
    		$disciplinas = Disciplina::all();

    		return view("anos.edit", compact("ano", "disciplinas"));
    	}
    }


    //UPDATE
    public function update(Request $dados, $id) {

    	$ano = Ano::findOrFail($id);

    	if (is_null($ano)) {
    		return redirect()->route("ano.index")->withErrors("Erro ao carregar Ano, tente novamente!");
    	}

    	else {

    		$dados_ano = $dados->all();
            $ano->fill($dados_ano)->save();

    		return redirect()->route("ano.index")->with("flash_message", "Ano actualizado com sucesso!");
    	}
    }


    //DESTROY
    public function destroy($id) {

    	$ano = Ano::findOrFail($id);

    	if (is_null($ano)) {
    		return redirect()->route("ano.index")->withErrors("Erro ao eliminar Ano, tente novamente!");
    	}

    	else {

    		$ano -> delete();

    		return redirect()->route("ano.index")->withErrors("flash_message", "Ano eliminado com sucesso!");
    	}
    }
}
