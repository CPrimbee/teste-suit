<?php

namespace App\Livewire\Curso;

use App\Livewire\Forms\Curso\CreateForm;
use App\Livewire\Traits\Alert;
use App\Models\Curso;
use Exception;
use Livewire\Component;

class Create extends Component
{
    use Alert;

    public CreateForm $form;

    public bool $modal = false;

    public function mount(): void
    {
        $this->form->fill([
            'preco' => $this->form->preco,
            'data_inicio' => now()->addMonth(),
            'data_fim' => now()->addMonths(2),
            'data_max_matricula' => now()->addWeeks(2),
        ]);
    }

    public function render()
    {
        return view('livewire.curso.create');
    }

    public function create(): void
    {
        $this->validate();

        $this->modal = false;

        try {
            Curso::create($this->form->all());

            $this->form->reset();
            $this->form->resetValidation();

            $this->dispatch('created');
            $this->toast()->success(__('Course created successfully!'))->send();

            return;
        } catch (Exception $e) {
            report($e);
        }

        $this->toast()->error(__('Error creating course!'))->send();
    }

    public function close(): void
    {
        $this->modal = false;

        $this->form->reset();
        $this->form->resetValidation();

        $this->mount();

        $this->dispatch('curso::index::refresh');
        $this->toast()->info(__('Operation cancelled!'))->send();
    }
}
