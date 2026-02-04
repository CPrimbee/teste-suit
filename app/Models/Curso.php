<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'nome',
        'descricao',
        'vagas',
        'preco',
        'data_inicio',
        'data_fim',
        'data_max_matricula',
        'ativo',
    ];

    protected $casts = [
        'vagas' => 'integer',
        'preco' => 'integer',
        'ativo' => 'boolean',
        'data_inicio' => 'date:Y-m-d',
        'data_fim' => 'date:Y-m-d',
        'data_max_matricula' => 'date:Y-m-d',
    ];

    protected $dates = [
        'data_inicio',
        'data_fim',
        'data_max_matricula',
    ];

    public function estudantes(): HasManyThrough
    {
        return $this->hasManyThrough(Estudante::class, EstudanteCurso::class, 'curso_id', 'id', 'id', 'estudante_id');
    }
}
