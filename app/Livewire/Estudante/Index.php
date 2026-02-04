<?php

namespace App\Livewire\Estudante;

use App\Models\Estudante;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 15;

    public ?string $search = null;

    public array $sort = ['column' => 'created_at', 'direction' => 'desc',];

    public array $headers = [
        ['index' => 'id', 'label' => '#'],
        ['index' => 'nome', 'label' => 'Nome'],
        ['index' => 'documento', 'label' => 'Documento'],
        ['index' => 'data_nascimento', 'label' => 'Data Nascimento'],
        ['index' => 'ativo', 'label' => 'Ativo'],
        ['index' => 'action', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.estudante.index');
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Estudante::query()
            ->with('cursos')
            ->when($this->search !== null, fn (Builder $query) => $query->whereAny(['nome', 'documento'], 'like', '%' . trim($this->search) . '%'))
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }
}
