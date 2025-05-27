<?php

namespace App\Models;

use App\Models\Nivel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use softDeletes;

    protected $table = 'cursos';

    protected $fillable = [
        'nome',
        'sigla',
        'total_horas',
        'nivel_id',
        'eixo_id',
    ];

    public function aluno(){
        return $this->hasMany(Aluno::class);
    }

    public function categoria(){
        return $this->hasOne(Categoria::class);
    }

    public function eixo(){
        return $this->belongsTo(Eixo::class);
    }

    public function nivel(){
        return $this->belongsTo(Nivel::class);
    }

    public function turma(){
        return $this->hasMany(Turma::class);
    }
}