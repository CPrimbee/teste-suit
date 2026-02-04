<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'nome',
        'descricao',
        'vagas',
        'preco',
        'max_alunos',
        'data_inicio',
        'data_fim',
        'data_max_matricula',
        'ativo',
    ];

    protected $casts = [
        'vagas' => 'integer',
        'preco' => 'integer',
        'max_alunos' => 'integer',
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
}
