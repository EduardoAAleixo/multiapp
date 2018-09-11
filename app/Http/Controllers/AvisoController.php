<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Aviso;
use App\Ano;
use App\Disciplina;

class AvisoController extends Controller
{

    //INDEX
    public function index() {

    	$avisos = Aviso::all();

    	foreach($avisos as $aviso) {
    		$aviso->ano = Ano::find($aviso->ano);
    		$aviso->disciplina = Disciplina::find($aviso->disciplina);
    	}

    	if (is_null($avisos)) {
    		return redirect()->route("index")->withErrors("Erro ao carregar Avisos, tente novamente!");
    	}

    	else {
    		return view("avisos.index", compact("avisos"));
    	}
    }

    //CREATE
    public function create() {

    	$anos = Ano::all();
    	$disciplinas = Disciplina::all();

    	return view("avisos.create", compact("anos", "disciplinas"));
    }

    //STORE
    public function store(Request $dados) {

    	$aviso = Aviso::create($dados->all() );

    	foreach ($dados->ano as $ano) {
    		$aviso->anos()->attach($ano);
    	}

    	foreach ($dados->disciplina as $disciplina) {
    		$aviso->disciplinas()->attach($disciplina);
    	}

    	if (is_null($aviso)) {
    		return redirect()->route("aviso.index")->withErrors("Erro ao criar Aviso, tente novamente!");
    	}

    	else {
    		return redirect()->route("aviso.index")->with("Aviso criado com sucesso!");
    	}
    }


    //SHOW
    public function show($id) {

    	$aviso = Aviso::findOrFail($id);

    	if (is_null($aviso)) {
    		return redirect("aviso.index")->withErrors("Erro ao carregar Aviso, tente novamente!");
    	}

    	else {
    		return view("avisos.item", compact("aviso"));
    	}
    }


    //EDIT
    public function edit($id) {

    	$aviso = Aviso::findOrFail($id);

    	if (is_null($aviso)) {
    		return redirect()->route("aviso.index")->withErrors("Erro ao carregar Aviso, tente novamente!");
    	}

    	else {
    		$anos = Ano::all();
    		$disciplinas = Disciplina::all();

    		return view("avisos.edit", compact("aviso", "anos", "disciplinas"));
    	}
    }

    //UPDATE
    public function update(request $dados, $id) {
    	
    	$aviso = Aviso::findoOrFail($id);

    	if (is_null($aviso)) {
    		return redirect()->route("aviso.index")->withErrors("Erro ao carregar Aviso, tente novamente!");
    	}

    	else {
    		$dados_aviso = $dados->all();
    		$aviso->fill($dados_aviso)->save();

    		return redirect()->route("aviso.index")->with("flash_message", "Aviso actualizado com sucesso!");
    	}
    }

    //DESTROY
    public function destroy($id) {

    	$aviso = Aviso::findOrFail($id);

    	if (is_null($aviso)) {
    		return redirect()->route("aviso.index")->withErrors("Erro ao eliminar Aviso, tente novamente!");
    	}

    	else {
    		return redirect()->route("aviso.index")->with("flash_message", "Aviso eliminado com sucessso!");
    	}
    }
}
