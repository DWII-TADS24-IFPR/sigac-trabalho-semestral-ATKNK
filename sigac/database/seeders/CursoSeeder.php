<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nome" => "Técnico em Informática",
                "sigla" => "INFO",
                "total_horas" => 100,
                "eixo_id" => 1,
                "nivel_id" => 1,
            ],
            [
                "nome" => "Tecnólogo em Análise e Desenvolvimento de Sistemas",
                "sigla" => "TADS",
                "total_horas" => 150,
                "eixo_id" => 1,
                "nivel_id" => 2,
            ],
            [
                "nome" => "Técnico em Mecânica",
                "sigla" => "MEC",
                "total_horas" => 100,
                "eixo_id" => 5,
                "nivel_id" => 1,
            ],
            [
                "nome" => "Técnico em Meio Ambiente",
                "sigla" => "MAMB",
                "total_horas" => 100,
                "eixo_id" => 2,
                "nivel_id" => 1,
            ],
            [
                "nome" => "Tecnólogo em Gestão Ambiental",
                "sigla" => "TGA",
                "total_horas" => 150,
                "eixo_id" => 2,
                "nivel_id" => 2,
            ],
            [
                "nome" => "Tecnólogo em Manutenção Industrial",
                "sigla" => "MIND",
                "total_horas" => 150,
                "eixo_id" => 5,
                "nivel_id" => 2,
            ]

        ];
        DB::table('cursos')->insert($data);
    }
}
