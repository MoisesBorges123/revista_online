<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PerfilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfis')->insert([
            [
                'id'=>1,                
                'nome'=>'Administrador',                
            ],
            [
                'id'=>2,                
                'nome'=>'Gestor',                
            ],
            [
                'id'=>3,                
                'nome'=>'Editor',                
            ],
            [
                'id'=>4,                
                'nome'=>'Autor',                
            ],
        ]);
    }
}
