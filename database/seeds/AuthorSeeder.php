<?php

//Esta clase me representa el seeder que me permite llenar la tabla author con valores de pruebas definidos

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // De esta dorma lleno la tabla  author con tres registros de autores distintos    
    public function run()
    {
        DB::table('author')->insert([
            'name' => 'JOSE',]);           
        DB::table('author')->insert([
            'name' => 'CARLOS',]);
        DB::table('author')->insert([
            'name' => 'PEDRO',]);    

    }
}
