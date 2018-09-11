<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Aluno;

class AlunoAPIController extends Controller
{

	//INDEX

    public function index() {

    	try {
    		// OK
    		$statusCode = 200;

    		//Reset data collection
    		$response = collect([]);

    		//Get all "ALUNOS" from DB
    		$alunos = Aluno::all();

    		foreach ($alunos as $aluno) {

    			//Add Aluno to the collection
    			$response->push([
    				'id' => $aluno->id,
    				'nome' => $aluno->nome,
    				'cartao_cidadao' => $aluno->cartao_cidadao,
    				'sexo' => $aluno->sexo,
    				'morada' => $aluno->morada,
    				'nacionalidade' => $aluno->nacionalidade,
    				'email' => $aluno->email,
    				'telemovel' => $aluno->telemovel
    			]);
    		}
    	} catch (Expection $e) {

    		//Bad Request
    		$statusCode = 400;
    	} finally {
    		return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    	}
    }

    //SHOW

    public function show($id) {

    	try {

    		$statusCode = 200;

    		$response = collect([]);

    		$aluno = Aluno::findOrFail($id);

    		$response->push([

    			'id' => $aluno->id,
    			'nome' => $aluno->nome,
    			'cartao_cidadao' => $aluno->cartao_cidadao,
    			'sexo' => $aluno->sexo,
    			'morada' => $aluno->morada,
    			'nacionalidade' => $aluno->nacionalidade,
    			'email' => $aluno->email,
    			'telemovel' => $aluno->telemovel,
    			'ano' => $aluno->ano,
    			'disciplinas' => $aluno->disciplinas
    		]);
    	} catch (Exception $e) {
    		$response->push(['error' => 'Aluno not found.']);

    		//NOT FOUND
    		$statusCode = 404;
    	} finally {
    		return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    	}
    }
}
