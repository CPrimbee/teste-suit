<?php

namespace App\Livewire\Estudante;

use App\Livewire\Traits\Alert;
use App\Models\Estudante;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Delete extends Component
{
    use Alert;

    public Estudante $estudante;

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
        $this->estudante->delete();

        $this->dispatch('deleted');

        $this->toast()->success(__('Student deleted successfully!'))->send();
    }
}