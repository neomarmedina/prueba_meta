<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('publish_date');
            $table->string('title');
            $table->unsignedInteger('author_id');//Aqui indico mi fk
            $table->foreign('author_id')->references('id')->on('author');//Aqui indico a quien hará referencia la fk en este caso a la tabla author
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
