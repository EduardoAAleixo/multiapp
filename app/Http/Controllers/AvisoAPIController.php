<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Aviso;

class AvisoAPIController extends Controller
{
    
    //INDEX

    public function index() {

    	try {
    		// OK
    		$statusCode = 200;

    		//Reset data collection
    		$response = collect([]);

    		//Get all "AVISOS" from DB
    		$avisos = Aviso::all();

    		foreach ($avisos as $aviso) {

    			//Add Aviso to the collection
    			$response->push([

    				'id' => $aviso->id,
                    'assunto' => $aviso->assunto,
                    'descricao' => $aviso->descricao,
                    'disciplinas' => $aviso->disciplinas,
                    'anos' => $aviso->anos

                ]);
    		}
    	} catch (Exception $e) {

            //BAD REQUEST
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

        	$aviso = Aviso::findOrFail($id);

        	$response->push([

        		'id' => $aviso->id,
        		'nome' => $aviso->nome,
        		'descricao' => $aviso->descricao,
        		'disciplinas' => $aviso->disciplinas,
        		'anos' => $avisos->anos
        			
            ]);
        } catch (Exception $e) {
    		$response->push(['error' => 'Aviso not found.']);

    		//NOT FOUND
    		$statusCode = 404;
    	} finally {
    		return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    	} 
    }
}
