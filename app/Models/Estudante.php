<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'documento',
        'data_nascimento',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'data_nascimento' => 'date:Y-m-d',
    ];

    protected $dates = [
        'data_nascimento',
    ];

    public function cursos(): HasManyThrough
    {
        return $this->hasManyThrough(Curso::class, EstudanteCurso::class, 'estudante_id', 'id', 'id', 'curso_id');
    }
}
