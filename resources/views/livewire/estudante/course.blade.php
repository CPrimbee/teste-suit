<div>
    <x-modal :title="__('Add Courses Student: #:id', ['id' => $form->estudante?->id])" wire
        x-on:open="setTimeout(() => $refs.name.focus(), 250)" size="4xl" blur center persistent>
        <form id="course-students-update-{{ $form->estudante?->id }}" wire:submit="save"
            class="grid grid-cols-2 gap-4 sm:grid-cols-4 mb-4">
            <div class="col-span-1 sm:col-span-2">
                <div class="flex flex-row items-end gap-4">
                    <div class="w-3/4">
                        <x-select.styled label="{{__('Course')}} *" :request="route('search.course')"
                            select="label:nome|value:id|description:preco" wire:model="form.curso_id" />
                    </div>

                    <x-button text="+" wire:click="add" />
                </div>
            </div>
        </form>
        <x-table :$headers :$sort :rows="$this->rows" paginate simple-pagination loading :quantity="[2, 5, 15, 25]">
            @interact('column_preco', $row)
            {{ 'R$ ' . number_format($row->preco / 100, 2, ',', '.') }}
            @endinteract
            @interact('column_data_inicio', $row)
            {{ $row->data_inicio->format('d/m/Y') }}
            @endinteract
            @interact('column_data_fim', $row)
            {{ $row->data_fim->format('d/m/Y') }}
            @endinteract

            @interact('column_action', $row)
            <div class="flex gap-1">
                <x-button.circle icon="trash" color="red" />
            </div>
            @endinteract
        </x-table>
        <x-slot:footer>
            <x-button text="{{__('Cancel')}}" color="secondary" light wire:click="close" loading="add" />
            <x-button type="submit" form="course-students-update-{{ $form->estudante?->id }}" loading="add">
                @lang('Save')
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>