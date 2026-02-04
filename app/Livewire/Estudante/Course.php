<?php

namespace App\Livewire\Estudante;

use App\Livewire\Forms\Estudante\CourseForm;
use App\Livewire\Traits\Alert;
use App\Models\Curso;
use App\Models\Estudante;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Course extends Component
{
    use Alert;
    use WithPagination;

    public CourseForm $form;

    public bool $modal = false;

    public ?int $quantity = 15;

    public ?string $search = null;

    public array $sort = ['column' => 'created_at', 'direction' => 'desc',];

    public array $headers = [
        ['index' => 'nome', 'label' => 'Curso'],
        ['index' => 'preco', 'label' => 'Preço'],
        ['index' => 'data_inicio', 'label' => 'Data Início'],
        ['index' => 'data_fim', 'label' => 'Data Fim'],
        ['index' => 'action', 'sortable' => false],
    ];

    #[Computed()]
    public function rows(): LengthAwarePaginator
    {
        return Curso::query()
            ->whereHas('estudantes', fn(Builder $query) => $query->where('estudante_id', $this->form->estudante?->id))
            ->when($this->search !== null, fn(Builder $query) => $query->whereAny(['nome'], 'like', '%' . trim($this->search) . '%'))
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function mount(Estudante $estudante): void
    {
        $this->form->setEstudante($estudante);
    }

    #[On('student::course::load')]
    public function load(Estudante $estudante): void
    {
        $this->mount($estudante);

        $this->modal = true;
    }

    public function render(): View
    {
        return view('livewire.estudante.course');
    }

    public function add(): void
    {
        $this->validate();

        $this->modal = false;

        try {
            $this->form->add();

            $this->form->reset();
            $this->form->resetValidation();

            $this->dispatch('student::index::refresh');
            $this->toast()->success(__('Course added successfully!'))->send();

            return;
        } catch (Exception $e) {
            report($e);
        }

        $this->toast()->error(__('Error adding course!'))->send();
    }

    public function close(): void
    {
        $this->modal = false;

        $this->form->reset();
        $this->form->resetValidation();

        $this->dispatch('student::index::refresh');
        $this->toast()->info(__('Operation cancelled!'))->send();
    }
}
