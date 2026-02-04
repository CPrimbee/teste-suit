<div>
    <x-button :text="__('Create Student')" wire:click="$toggle('modal')" sm />

    <x-modal :title="__('Create Student')" wire x-on:open="setTimeout(() => $refs.name.focus(), 250)" size="4xl" blur
        center persistent>
        <form id="student-create" wire:submit="create" class="grid grid-cols-2 gap-4 sm:grid-cols-4">
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
            <div class="flex justify-end gap-x-4">
                <x-button text="{{__('Cancel')}}" color="secondary" light wire:click="close" />
                <x-button text="{{__('Create')}}" wire:click="create" />
            </div>
        </x-slot:footer>
    </x-modal>
</div>