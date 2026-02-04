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
    ];

    protected $dates = [
        'data_inicio',
        'data_fim',
        'data_max_matricula',
    ];
}
