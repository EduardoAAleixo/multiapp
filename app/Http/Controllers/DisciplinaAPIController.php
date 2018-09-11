<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Disciplina;

class DisciplinaAPIController extends Controller
{
    //INDEX

    public function index() {

    	try {
    		//OK
    		$statusCode = 200;

    		//Reset data collection
    		$response = collect([]);

    		//Get all DISCIPLINAS from DB
    		$disciplinas = Disciplina::all();

    		foreach($disciplinas as $disciplina) {
    			//Add Disciplinas to the collection
    			$response->push([

    				'id' => $disciplina->id,
    				'nome' => $disciplina->nome,
    				'etcs' => $disciplina->etcs,
    				'ano' => $disciplina->anos,
    				'alunos' => $disciplina->alunos,
    				'avisos' => $disciplina->avisos,
    				'horarios' => $disciplina->horarios
    				//'professores' => $disciplina->professores
    			]);
    		}
    	} catch (Expection $e) {

    	//Bad Request
   		$statusCode = 400;
   		
        } finally {
    		return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin','*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    	} 
    }

    //SHOW

    public function show($id) {

    	try {
    		$statusCode = 200;

    		$response = collect([]);

    		$disciplina = Disciplina::findOrFail($id);

    		$response->push([

    			'id' => $disciplina->id,
    			'nome' => $disciplina->nome,
    			'etcs' => $disciplina->etcs,
    			'ano' => $disciplina->ano,
    			'alunos' => $disciplina->alunos,
    			'avisos' => $disicplina->avisos,
    			'horarios' => $disciplina->horarios
    			//'professores' => $disciplina->professores
    		]);
    	} catch (Exception $e) {
    		$response->push(['error' => 'Disciplina not found.']);

    		//NOT FOUND
    		$statusCode = 404;
    		
    	} finally {
    		return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    	}
    }
}
