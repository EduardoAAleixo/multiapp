<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Professor;

class ProfessorAPIController extends Controller
{
    //INDEX

    public function index() {

    	try {
    		//OK
    		$statusCode = 200;

    		//Reset data collection
    		$response = collect([]);

    		//Get all PROFESSORES from DB
    		$professores = Professor::all();

    		foreach($professores as $professor) {
    			//Add Professores to the collection
    			$response->push([

    				'id' => $professor->id,
    				'nome' => $professor->nome,
    				'email' => $professor->email,
    				//'disciplinas' => $professor->disciplinas
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

    		$professor = Professor::findOrFail($id);

    		$response->push([

    			'id' => $professor->id,
    			'nome' => $professor->nome,
    			'email' => $professor->email,
    			//'disciplinas' => $professor->disciplinas

    		]);
    	} catch (Exception $e) {
    		$response->push(['error' => 'Professor not found.']);

    		//NOT FOUND
    		$statusCode = 404;
    		
    	} finally {
    		return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    	}
    }
}
