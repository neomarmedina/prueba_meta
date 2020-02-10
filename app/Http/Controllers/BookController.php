<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Author;// aqui hacemos referencia al modelo Author
use App\Book;// aqui hacemos referencia al modelo Book
use stdClass;//La uso para evitar que se sobreecriban los arreglos

class BookController extends Controller
{
    

    //Este meotodo me traerá todos los book que esten en la bd 

    public function index()
    {
    
   	 	$book= Book::all();// Aqui extraigo todos los libros de loa bd

		foreach ($book as $book) 
		{
			$auxiliar = new stdClass();//Uso esto para que no se sobre escriba el objeto y se puedan mostrar todos los registros de la tabla book 

			$author= Author::find($book->author_id);// Aqui extraigo el registro de un libro en especifico	

			// Aqui guardo en el vector $auxiliar los registros de la tabla book
			
			$auxiliar->id=$book->id;
			$auxiliar->title=$book->title;
			$auxiliar->publish_date=$book->publish_date;
			$auxiliar->author_id=$book->author_id;
			$auxiliar->author_name=$author->name;

			$book_autor[]=$auxiliar;

		   	
    	 }
    	 	// Aqui envío por json los datos del vector $book_autor[]	

	    	 $response =[
			     'succes' => true,
			     'Book' => $book_autor,
			     'Message' => 'Datos de Libros',
				];
			return response ()->json ($response, 200);

    }


    //Función para registrar book (libros) asociado a un authot (autor)
 
	public function store(Request $request)
    {
    	
    	//Validaciones

    	$validator = Validator::make($request->all(), Book::$rules, Book::$messages);

		if($validator->passes())
		{

	    	$book=new Book();// Aqui extraigo todos los libros de loa bd	
	    	$book->title=$request->title;
	    	$book->publish_date=$request->publish_date;
	    	$book->author_id=$request->author_id;
	    	$book->save();
	    	$response =[
	   
	     	'message' => 'LIbro Registrado Exitosamente',
			
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

}


