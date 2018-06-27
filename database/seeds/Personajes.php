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
        factory(App\Personaje::class, 12)->create();
    }
}
