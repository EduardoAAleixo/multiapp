<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Aluno;
use App\Ano;
use App\Disciplina;

class AlunoController extends Controller
{

    //INDEX public function index() {
        
        $alunos = Aluno::all();
        
        foreach($alunos as $aluno) {
            $aluno->ano = Ano::find($aluno->ano);
            $aluno->disciplina = Disciplina::find($aluno->disciplina);
        }
        
        if (is_null($alunos)) {
            return redirect()->route("index")->withErrors("Erro ao carregar Alunos, tente novamente!");
        }
        else {
            return view("alunos.index", compact("alunos"));
        }
    }
    

    //CREATE
    public function create() {
        
        $anos = Ano::all();
        $disciplinas = Disciplina::all();
        
        return view("alunos.create", compact("anos", "disciplinas"));
    }
    

    //STORE
    public function store(Request $dados) {
        
        $aluno = Aluno::create($dados->all());
        
        foreach ($dados->ano as $ano) {
            $aluno->anos()->attach($ano);//wishes is the method name that you define in model
        }
        
        foreach ($dados->disciplina as $disciplina) {
            $aluno->disciplinas()->attach($disciplina);//wishes is the method name that you define in model
        }
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao criar Aluno, tente novamente!");  
        }
        else {
            return redirect()->route("aluno.index")->with("Aluno criado com sucesso!");
        }
    }
    

    //SHOW
    public function show($id) {
        
        $aluno = Aluno::findOrFail($id); 
        
        $aluno->ano = Ano::find($aluno->ano); 
        
        $aluno->disciplina = Disciplina::find($aluno->disciplina);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao carregar Aluno, tente novamente!");
        }
        else {
            return view("alunos.item", compact("aluno")); 
        }
    }


    //EDIT
    public function edit($id) {
        
        $aluno = Aluno::findOrFail($id);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao carregar Aluno, tente novamente!");
        }
        else {
            $anos = Ano::all(); 
            
            $disciplinas = Disciplina::all();
            
            return view("alunos.edit", compact("aluno", "anos", "disciplinas"));
        }
    }
    

    //UPDATE
    public function update(Request $dados, $id) {
        $aluno = Aluno::findOrFail($id);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao carregar Aluno, tente novamente!");
        }
        else {
            
            $dados_aluno = $dados->all();
            
            $aluno->fill($dados_aluno)->save();
            
            return redirect()->route("aluno.index")->with("flash_message", "Aluno atualizado com sucesso!");
        }
    }
    

    //DESTROY
    public function destroy($id) {
        $aluno = Aluno::findOrFail($id);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao eliminar aluno, tente novamente!");
        }
        else {
            $aluno -> delete();
            return redirect()->route("aluno.index")->with("flash_message", "Aluno eliminado com sucesso!");
        }
    }
}
