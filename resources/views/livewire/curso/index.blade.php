<div>
    <x-card>
        <x-table :$headers :$sort :rows="$this->rows" paginate simple-pagination filter loading
            :quantity="[2, 5, 15, 25]">
            @interact('column_created_at', $row)
            {{ $row->created_at->diffForHumans() }}
            @endinteract

            @interact('column_action', $row)
            <div class="flex gap-1">
                <x-button.circle icon="pencil" wire:click="confirm" />
                <x-button.circle icon="trash" color="red" wire:click="confirm" />
            </div>
            @endinteract
        </x-table>
    </x-card>
</div>