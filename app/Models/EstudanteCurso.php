<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EstudanteCurso extends Pivot
{
    protected $table = 'estudante_curso';

    protected $fillable = [
        'estudante_id',
        'curso_id',
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    public function estudante(): BelongsTo
    {
        return $this->belongsTo(Estudante::class);
    }
}
