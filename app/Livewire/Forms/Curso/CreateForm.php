<?php

namespace App\Livewire\Forms\Curso;

use Livewire\Form;

class CreateForm extends Form
{
    public $nome = '';
    public $descricao = '';
    public $vagas = 5;
    public $preco = 100;
    public $data_inicio = '';
    public $data_fim = '';
    public $data_max_matricula = '';
    public $ativo = true;
    public $tipo = 'online';

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:20',
            'preco' => 'required|numeric|min:1.00',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'data_max_matricula' => 'required|date',
            'vagas' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => __('The name is required.'),
            'preco.required' => __('The price is required.'),
            'data_inicio.required' => __('The start date is required.'),
            'data_fim.required' => __('The end date is required.'),
            'data_max_matricula.required' => __('The max enrollment date is required.'),
            'vagas.required' => __('The vacancies is required.'),
            'data_fim.after' => __('The end date must be after the start date.'),
        ];
    }
}
