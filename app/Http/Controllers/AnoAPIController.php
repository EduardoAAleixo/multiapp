<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Ano;

class AnoAPIController extends Controller
{
    
  //INDEX

  public function index() {

    try {
    	// OK
    	$statusCode = 200;

    	//Reset data collection
    	$response = collect([]);

    	//Get all "ANOS" from DB
    	$anos = Ano::all();

    	foreach ($anos as $ano) {

    		//Add Ano to the collection
    		$response->push([

    			'id' => $ano->id,
    			'nome' => $ano->nome,
    			'alunos' => $ano->alunos,
    			'avisos' => $ano->avisos,
    			'disciplinas' => $ano->disciplinas,
          'eventos' => $ano->eventos

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

      $ano = Ano::findOrFail($id);

      $response->push([

        'id' => $ano->id,
        'nome' => $ano->nome,
        'alunos' => $ano->alunos,
        'avisos' => $ano->avisos,
        'disciplinas' => $ano->disciplinas,
        'eventos' => $ano->eventos 
        
      ]);
    } catch (Exception $e) {
      $response->push(['error' => 'Ano not found.']);

      //NOT FOUND
      $statusCode = 404;

    } finally {
      return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    }
  }
}
