<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Author;
class AuthorController extends Controller
{
    //Este metodo me traerá todos los Author de  la bd

    public function index()
    {

	    $author= Author::all();

	   	$response =[
	     'succes' => true,
	     'Authores' => $author,
	     'Message' => 'Datos de autores',
		];

		return response ()->json ($response, 200);
    }


	public function store(Request $request)
    {

    	 //Validaciones (Las reglas estan definidas en el modelo)

    	$validator = Validator::make($request->all(), Author::$rules, Author::$messages);

		if($validator->passes())
		{


	    	$author= new Author();
	    	$author->name=$request->name;
	    	$author->save();
	    	$response =[
	   
	     	'Message' => 'Autor Registrado Exitosamente',
			
			];
			return response ()->json ($response, 201);
		}
		else
		{
			$response = [
				'errors' => $validator->errors()
			];

			return response()->json($response, 202);
		}	
   		
    }


	//Aqui veo el detalle de un Autor en especifico

    public function detalle_autor($id)
    {

	    $author= Author::find($id);

	    if($author)
	    {	
	 
		   	$response =[
		     'succes' => true,
		     'Author' => $author,
		     'Message' => 'Nombre del Autor',
			];
			return response ()->json ($response, 200);

		}			
		else
		{
			    	
		   	$response =[
		     'succes' => false,
		     'Message' => 'Autor no encontrado',
			];
			return response ()->json ($response, 202);

	    }	    
	   
	  }


}
