<div>
    <x-card>
        <div class="mb-2 mt-4">
            <livewire:estudante.create @created="$refresh" />
        </div>

        <x-table :$headers :$sort :rows="$this->rows" paginate simple-pagination filter loading
            :quantity="[2, 5, 15, 25]">
            @interact('column_data_nascimento', $row)
            {{ $row->data_nascimento->format('d/m/Y') }}
            @endinteract
            @interact('column_ativo', $row)
            {{ $row->ativo ? 'Sim' : 'Não' }}
            @endinteract

            @interact('column_action', $row)
            <div class="flex gap-1">
                <x-button.circle icon="pencil" color="teal"
                    wire:click="$dispatch('student::update::load', { 'estudante' : '{{ $row->id }}'})" />
                <x-button.circle icon="book-open" color="blue"
                    wire:click="$dispatch('student::course::load', { 'estudante' : '{{ $row->id }}'})" />
                <livewire:estudante.delete :estudante="$row" :key="uniqid('', true)" @deleted="$refresh" />
            </div>
            @endinteract
        </x-table>
    </x-card>

    <livewire:estudante.update :key="uniqid('', true)" @updated="$refresh" />
    <livewire:estudante.course :key="uniqid('', true)" />
</div>