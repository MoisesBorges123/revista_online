<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('instituicoes')->insert([
            'cnpj'=>'',
            'nome_fantasia'=>'Faculdade Alfa Unipac',
            'endereco_id'=>1,
            'site'=>'www.alfaunipac.com.br',
            'telefone'=>'(33) 3529-4750',
            'email'=>'',
            'logo'=>'assets/img/logo.png',
            'descricao'=>'',
            'missao'=>'',
            'visao'=>'',
            'valores'=>'',
            'objetivos'=>'',
        ]);
    }
}
