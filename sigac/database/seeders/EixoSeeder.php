<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EixoSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            ["nome" => "Informação e Comunicação"],
            ["nome" => "Ambiente e Saúde"],
            ["nome" => "Ciências Humanas"],
            ["nome" => "Produção Cultural e Design"],
            ["nome" => "Controle e Processos Industriais"],
        ];

        DB::table('eixos')->insert($data);
    }
}
