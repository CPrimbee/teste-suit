<?php

namespace App\Livewire\Curso;

use App\Models\Curso;
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
        ['index' => 'preco', 'label' => 'Preço'],
        ['index' => 'data_inicio', 'label' => 'Data Início'],
        ['index' => 'data_fim', 'label' => 'Data Fim'],
        ['index' => 'data_max_matricula', 'label' => 'Matrícula Até'],
        ['index' => 'ativo', 'label' => 'Ativo'],
        ['index' => 'action', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.curso.index');
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Curso::query()
            ->when($this->search !== null, fn (Builder $query) => $query->whereAny(['nome'], 'like', '%' . trim($this->search) . '%'))
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }
}
