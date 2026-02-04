<div>
    <x-card>
        <div class="mb-2 mt-4">
            <livewire:curso.create @created="$refresh" />
        </div>

        <x-table :$headers :$sort :rows="$this->rows" paginate simple-pagination filter loading
            :quantity="[2, 5, 15, 25]">
            @interact('column_preco', $row)
            {{ 'R$ ' . number_format($row->preco / 100, 2, ',', '.') }}
            @endinteract
            @interact('column_data_inicio', $row)
            {{ $row->data_inicio->format('d/m/Y') }}
            @endinteract
            @interact('column_data_fim', $row)
            {{ $row->data_fim->format('d/m/Y') }}
            @endinteract
            @interact('column_data_max_matricula', $row)
            {{ $row->data_max_matricula->format('d/m/Y') }}
            @endinteract
            @interact('column_ativo', $row)
            {{ $row->ativo ? 'Sim' : 'Não' }}
            @endinteract

            @interact('column_action', $row)
            <div class="flex gap-1">
                <x-button.circle icon="pencil" color="teal"
                    wire:click="$dispatch('course::update::load', { 'curso' : '{{ $row->id }}'})" />
                <livewire:curso.delete :curso="$row" :key="uniqid('', true)" @deleted="$refresh" />
            </div>
            @endinteract
        </x-table>
    </x-card>

    <livewire:curso.update @updated="$refresh" />
</div>