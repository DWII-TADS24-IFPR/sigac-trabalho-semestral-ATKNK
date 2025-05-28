<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nome" => "João Vitor Santos Dias da Silva",
                'cpf' => "123456",
                'email' => "joao@gmail.com",
                'senha' => "senha123",
                'user_id' => null,
                'curso_id' => 1,
                'turma_id' => 1,
            ],
            [
                "nome" => "Arthur Takayuki Nakayama",
                'cpf' => "149477",
                'email' => "arthur@gmail.com",
                'senha' => "senha123",
                'user_id' => null,
                'curso_id' => 1,
                'turma_id' => 1,
            ],
            [
                "nome" => "Cristian de Oliveira Mitugui",
                'cpf' => "49494",
                'email' => "cristian@gmail.com",
                'senha' => "senha123",
                'user_id' => null,
                'curso_id' => 1,
                'turma_id' => 1,
            ]
        ];
        DB::table('alunos')->insert($data);
    }
}
