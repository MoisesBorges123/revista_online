<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AreaDeEstudosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas_de_estudos')->insert([
            [
                'nome'=>'Ciências Exatas e da Terra',
                'icone'=>'<span class="bi bi-graph-up"></span>'
            ],
            [
                'nome'=>'Ciências Biológicas',
                'icone'=>'<span class="bi bi-globe2">'
            ],
            [
                'nome'=>'Engenharias',
                'icone'=>'<span class="bi bi-rulers"></span>'
            ],
            [
                'nome'=>'Ciências da Saúde',
                'icone'=>'<span class="bi bi-heart-pulse"></span>'
            ],
            [
                'nome'=>'Ciências Agrárias',
                'icone'=>'<span class="bi bi-file-image"></span>'
            ],
            [
                'nome'=>'Linguística, Letras e Artes',
                'icone'=>'<span class="bi bi-slack"></span>'
            ],
            [
                'nome'=>'Ciências Sociais Aplicadas',
                'icone'=>'<span class="bi bi-diagram-3"></span>'
            ],
            [
                'nome'=>'Ciências Humanas',
                'icone'=>'<span class="bi bi-people ></span>'
            ]
        ]);
    }
}
