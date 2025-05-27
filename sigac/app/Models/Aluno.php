<?php

namespace App\Models;

use App\Models\User;
use App\Models\Curso;
use App\Models\Turma;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use softDeletes;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'senha',
        'user_id',
        'curso_id',
        'turma_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comprovante(){
        return $this->hasMany(Comprovante::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    public function declaracao(){
        return $this->hasMany(Declaracao::class);
    }
}