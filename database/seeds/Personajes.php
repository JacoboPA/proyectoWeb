<?php

use Illuminate\Database\Seeder;

class Personajes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personajes')->insert([
            'id'=>'1',
            'clase'=>'Mago',
            'raza'=>'Elfo',
            'nombre'=>'Malekith',
            'historia'=>'sdalskdjalskdjas',
            'name' =>'usuario1',
            'imagen'=>'Jacobo/Malekith.jpg'
        ]);
    }
}
