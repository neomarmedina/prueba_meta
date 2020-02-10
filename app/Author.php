<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    

	//definimos  la tabla de bd que va a utlizar esta clase

    Protected $table='author';

    //definimos el atributo que será el primer key de la tabla o modelo

    Protected $primaryKey='id';

    public $timestamps=true;

    //adefinimos los campos o atributos que van a recibir un valor para poder almacenarlos en una bd
    Protected $fillable=['id','name'];

    // Aqui defino una variable estatica para definir las reglas de validación
    public static $rules = [
        'name' => 'required|unique:author|max:10'
    ];


    //Aqui declaro mi mensaje para devolverlo en caso de error en español
    public static $messages = [
        'name.required' => 'El nombre del autor es requerido.',
        'name.unique' => 'El nombre ya existe.',
        'name.max' => 'El nombre debe ser menor a 10 caracteres.'
    ];



    Protected $guarded =[

    ];


    //En esta función estoy definiendo el tipo de relación en este caso de unos a muchos con el modelo Book, un Author posse muchos Libros

    public function book()
    {

    	return $this->hasMany(Book::class,'autor_id','id');//Aqui defino la relacion Author con book

    }

}
