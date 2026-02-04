<?php

namespace App\Livewire\Curso;

use App\Livewire\Forms\Curso\UpdateForm;
use App\Livewire\Traits\Alert;
use App\Models\Curso;
use Exception;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    use Alert;

    public UpdateForm $form;

    public bool $modal = false;

    public function mount(Curso $curso): void
    {
        $this->form->setCurso($curso);
    }

    #[On('course::update::load')]
    public function load(Curso $curso): void
    {
        $this->mount($curso);

        $this->modal = true;
    }

    public function render(): View
    {
        return view('livewire.curso.update');
    }

    public function save(): void
    {
        $this->validate();

        $this->modal = false;

        try {
            $this->form->update();

            $this->form->reset();
            $this->form->resetValidation();

            $this->dispatch('updated');
            $this->toast()->success(__('Course updated successfully!'))->send();

            return;
        } catch (Exception $e) {
            report($e);
        }

        $this->toast()->error(__('Error updating course!'))->send();
    }

    public function close(): void
    {
        $this->modal = false;

        $this->form->reset();
        $this->form->resetValidation();

        $this->dispatch('curso::index::refresh');
        $this->toast()->info(__('Operation cancelled!'))->send();
    }
}