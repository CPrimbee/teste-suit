<?php

namespace App\Livewire\Curso;

use App\Livewire\Traits\Alert;
use App\Models\Curso;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Delete extends Component
{
    use Alert;

    public Curso $curso;

    public function render(): string
    {
        return <<<'HTML'
        <div>
            <x-button.circle icon="trash" color="red" wire:click="confirm" />
        </div>
        HTML;
    }

    #[Renderless()]
    public function confirm(): void
    {
        $this->question()
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    public function delete(): void
    {
        $this->curso->delete();

        $this->dispatch('deleted');

        $this->toast()->success(__('Course deleted successfully!'))->send();
    }
}
