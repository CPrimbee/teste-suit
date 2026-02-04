<?php

namespace App\Livewire\Estudante;

use App\Livewire\Forms\Estudante\CreateForm;
use App\Livewire\Traits\Alert;
use App\Models\Estudante;
use Exception;
use Livewire\Component;

class Create extends Component
{
    use Alert;

    public CreateForm $form;

    public bool $modal = false;

    public function mount(): void
    {
        $this->form->fill([]);
    }

    public function render()
    {
        return view('livewire.estudante.create');
    }

    public function create(): void
    {
        $this->validate();

        $this->modal = false;

        try {
            Estudante::create($this->form->all());

            $this->form->reset();
            $this->form->resetValidation();

            $this->dispatch('created');
            $this->toast()->success(__('Student created successfully!'))->send();

            return;
        } catch (Exception $e) {
            report($e);
        }

        $this->toast()->error(__('Error creating student!'))->send();
    }

    public function close(): void
    {
        $this->modal = false;

        $this->form->reset();
        $this->form->resetValidation();

        $this->mount();

        $this->dispatch('estudante::index::refresh');
        $this->toast()->info(__('Operation cancelled!'))->send();
    }
}