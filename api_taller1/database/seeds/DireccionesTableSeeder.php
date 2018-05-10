<?php

use Illuminate\Database\Seeder;

class DireccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direcciones')->insert([
            'url' => 'https://github.com/FelipeUFRO15',
            'short' => 'gthbf',
            'id_usuario' => '1',
        ]);
    }
}
