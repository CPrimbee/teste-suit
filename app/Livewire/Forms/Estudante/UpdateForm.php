<?php

namespace App\Livewire\Forms\Estudante;

use App\Models\Estudante;
use Livewire\Form;

class UpdateForm extends Form
{
    public ?Estudante $estudante;

    public $nome = '';
    public $documento = '';
    public $data_nascimento = '';
    public $ativo = true;

    public function setEstudante(Estudante $estudante): void
    {
        $this->estudante = $estudante;

        $this->fill([
            'nome' => $estudante->nome,
            'documento' => $estudante->documento,
            'data_nascimento' => $estudante->data_nascimento,
            'ativo' => $estudante->ativo,
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3',
            'documento' => 'required|string|max:18|unique:estudantes,documento,' . $this->estudante->id,
            'data_nascimento' => 'required|date',
            'ativo' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => __('The name is required.'),
            'nome.min' => __('The name must be at least 3 characters long.'),
            'documento.required' => __('The document is required.'),
            'documento.unique' => __('The document already exists.'),
            'data_nascimento.required' => __('The birth date is required.'),
            'ativo.required' => __('The active is required.'),
        ];
    }

    public function update(): void
    {
        $this->estudante->update(
            $this->all()
        );
    }
}
