<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enderecos')->insert([
            'rua'=>'Rua Engenheiro Célso Murta',
            'bairro'=>'Dr. Laerte Laender',
            'numero'=>'600',
            'cep'=>'39803-000',
            'cidade'=>'Teófilo Otoni',
            'estado'=>'MG'

        ]);
    }
}
