<?php

namespace App\Livewire\Forms\Curso;

use App\Models\Curso;
use Livewire\Form;

class UpdateForm extends Form
{
    public ?Curso $curso;

    public $nome = '';
    public $descricao = '';
    public $vagas = 5;
    public $preco = 100;
    public $max_alunos = 5;
    public $data_inicio = '';
    public $data_fim = '';
    public $data_max_matricula = '';
    public $ativo = true;
    public $tipo = 'online';

    public function setCurso(Curso $curso): void
    {
        $this->curso = $curso;

        $this->fill([
            'nome' => $curso->nome,
            'descricao' => $curso->descricao,
            'vagas' => $curso->vagas,
            'preco' => $curso->preco / 100,
            'max_alunos' => $curso->max_alunos,
            'data_inicio' => $curso->data_inicio,
            'data_fim' => $curso->data_fim,
            'data_max_matricula' => $curso->data_max_matricula,
            'ativo' => $curso->ativo,
            'tipo' => $curso->tipo,
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:20',
            'preco' => 'required|numeric|min:1.00',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'data_max_matricula' => 'required|date',
            'max_alunos' => 'required|numeric|min:1',
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
            'max_alunos.required' => __('The max students is required.'),
            'vagas.required' => __('The vacancies is required.'),
            'data_fim.after' => __('The end date must be after the start date.'),
        ];
    }

    public function update(): void
    {
        $this->preco = (int) round($this->preco * 100);

        $this->curso->update(
            $this->all()
        );
    }
}
