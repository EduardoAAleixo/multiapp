<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Horario;

class HorarioAPIController extends Controller
{
    
    //INDEX

    public function index() {

    	try {
    		//OK
    		$statusCode = 200;

    		//Reset data collection
    		$response = collect([]);

    		//Get all HORÁRIOS from DB
    		$horarios = Horario::all();

    		foreach($horarios as $horario) {
    			//Add Horarios to the collection
    			$response->push([

    				'id' => $horario->id,
    				'inicio' => $horario->inicio,
    				'fim' => $horario->fim,
    				'sala' => $horario->sala,
    				'disciplinas' => $horario->disciplinas
                    
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

    		$horario = Horario::findOrFail($id);

    		$response->push([

    			'id' => $horario->id,
    			'inicio' => $horario->inicio,
    			'fim' => $horario->fim,
    			'sala' => $horario->sala,
    			'disciplinas' => $horario->disciplinas

    		]);
    	} catch (Exception $e) {
            $response->push(['error' => 'Horario not found.']);
            
            //NOT FOUND
            $statusCode = 404;

        } finally {
            	return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
