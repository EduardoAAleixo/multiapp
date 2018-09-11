<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Estagio;

class EstagioAPIController extends Controller
{
 	
 	//INDEX

    public function index() {

    	try {
    		// OK
    		$statusCode = 200;

    		//Reset data collection
    		$response = collect([]);

    		//Get all "ESTAGIOS" from DB
    		$estagios = Estagio::all();

    		foreach ($estagios as $estagio) {

    			//Add Estagio to the collection
    			$response->push([

    				'id' => $estagio->id,
    				'area' => $estagio->area,
    				'empresa' => $estagio->empresa,
    				'horas' => $estagio->horas,
    				'contacto' => $estagio->contacto,
    				'anos' => $estagio->anos
                    
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

    		$estagio = Estagio::findOrFail($id);

    		$response->push([ 

    				'id' => $estagio->id,
    				'area' => $estagio->area,
    				'empresa' => $estagio->empresa,
    				'horas' => $estagio->horas,
    				'contacto' => $estagio->contacto,
    				'anos' => $estagio->anos

    		]);
        } catch (Exception $e) {
    		$response->push(['error' => 'Estagio not found.']);

    		//NOT FOUND
    		$statusCode = 404;
    		
    	} finally {
    		return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    	}
    }  
}
