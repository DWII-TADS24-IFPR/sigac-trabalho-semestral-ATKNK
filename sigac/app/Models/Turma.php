<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Curso;

class Turma extends Model
{
    use softDeletes;

    protected $table = 'turmas';

    protected $fillable = [
        'ano',
        'curso_id',
    ];

    public function aluno(){
        return $this->hasMany(Aluno::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}