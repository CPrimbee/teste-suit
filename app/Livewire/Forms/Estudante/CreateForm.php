<?php

namespace App\Livewire\Forms\Estudante;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    public $nome = '';
    public $documento = '';
    public $data_nascimento = '';
    public $ativo = true;

    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3',
            'documento' => 'required|string|max:18|unique:estudantes,documento',
            'data_nascimento' => 'required|date',
            'ativo' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => __('The name is required.'),
            'documento.required' => __('The document is required.'),
            'documento.unique' => __('The document already exists.'),
            'data_nascimento.required' => __('The birth date is required.'),
            'ativo.required' => __('The active is required.'),
        ];
    }
}
