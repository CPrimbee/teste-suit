<div>
    <x-modal :title="__('Update Student: #:id', ['id' => $form->estudante?->id])" wire
        x-on:open="setTimeout(() => $refs.name.focus(), 250)" size="4xl" blur center persistent>
        <form id="student-update-{{ $form->estudante?->id }}" wire:submit="save"
            class="grid grid-cols-2 gap-4 sm:grid-cols-4">
            <div class="self-center col-span-1 sm:col-span-1">
                <x-toggle label="{{__('Active')}}" lg wire:model="form.ativo" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <x-input label="{{__('Document')}}" wire:model="form.documento" />
            </div>

            <div class="col-span-1 sm:col-span-2">
                <x-date label="{{__('Birthdate')}}" format="DD/MM/YYYY"
                    wire:model.onchange.debounce="form.data_nascimento" />
            </div>

            <div class="col-span-full sm:col-span-4">
                <x-input label="{{__('Name')}} *" wire:model="form.nome" x-ref="name" />
            </div>
        </form>
        <x-slot:footer>
            <x-button type="submit" form="student-update-{{ $form->estudante?->id }}" loading="save">
                @lang('Save')
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>