<?php

namespace App;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
	 //definimos  la tabla de bd que va a utlizar esta clase

    Protected $table='book';

    //definimos el atributo que será el primer key de la tabla o modelo

    Protected $primaryKey='id';

    public $timestamps=true;



    //ahora definimos los atributos 

    Protected $fillable=['id','name'];

    // Aqui defino una variable estatica para definir las reglas de validación
    
    public static $rules = [
        'title' => 'required|unique:book|max:20'
    ];

    //Aqui declaro mi mensaje para devolverlo en caso de error

    public static $messages = [
        'title.required' => 'El titulo del libro es requerido.',
        'title.unique' => 'El titulo del libro ya existe.',
        'title.max' => 'El titulo del libro debe ser menor a 10 caracteres.'
    ];

    Protected $guarded =[

    ];

    //Aqui defino la relacion book y author 

    public function author()
    {

    	return $this->belongsTo(Author::class);

    }


}
