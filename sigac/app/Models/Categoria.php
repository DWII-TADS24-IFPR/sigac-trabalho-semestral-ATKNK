<?php

namespace App\Models;

use App\Models\Curso;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use softDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'maximo_horas',
        'curso_id',
    ];

    public function comprovante(){
        return $this->hasMany(Comprovante::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function documento(){
        return $this->hasMany(Documento::class);
    }
}