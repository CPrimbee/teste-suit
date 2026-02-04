<?php

namespace App\Livewire\Forms\Estudante;

use App\Models\Estudante;
use App\Models\EstudanteCurso;
use Livewire\Form;

class CourseForm extends Form
{
    public ?Estudante $estudante;

    public $curso_id = null;
    public $estudante_id = null;

    public function setEstudante(Estudante $estudante): void
    {
        $this->estudante = $estudante;

        $this->fill([
            'estudante_id' => $estudante->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'curso_id' => 'required|exists:cursos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'curso_id.required' => __('The course is required.'),
            'curso_id.exists' => __('The course does not exist.'),
        ];
    }

    public function add(): void
    {
        EstudanteCurso::create([
            'curso_id' => $this->curso_id,
            'estudante_id' => $this->estudante_id,
        ]);
    }
}
