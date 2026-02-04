<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
