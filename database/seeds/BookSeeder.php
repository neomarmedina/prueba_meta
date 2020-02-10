<?php

use Illuminate\Database\Seeder;

use App\Author;// aqui hacemos referencia al modelo Author
    

//Esta clase me representa el Seeder Que me permite llenar la tabla BOOK con valores de pruebas tomando en cuenta la relación con la tabla Author 

use App\Book;// aqui hacemos referencia al modelo Book


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       
       $author= Author::all();//Consulta todo los registros del modelo
       
       $book =new Book; //Creo un objeto de la clase Book

       $title=['matematicas','bilogia','catellano'];//Aqui creo un vector de titulos

       $publish_date=['2020-02-01','2020-02-02','2020-02-03'];///Aqui creo un vector de fecha de publicaciones



        //Aqui recorro todos los registros de la tabla author para crear tantos registros como author existan y ademas saber el id del author por cada iteración y llenar la tabla book 

               
        $i=0;

        foreach ($author as $authors)
        {


            $book= new Book;

            //ahora cargo cada atributo con los valores recibido del formulario  campo de este objeto.

            $book->title=$title[$i];//aqui cargo la clave foranea, que representa la categoria a la que pertenecerá el articulo a crear.

            $book->publish_date=$publish_date[$i];

            $book->author_id=$authors->id;           

            $book->save();

            $i=$i+1;
        }   


    }
}
