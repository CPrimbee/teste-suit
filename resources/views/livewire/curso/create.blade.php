<div>
    <x-button :text="__('Create New Course')" wire:click="$toggle('modal')" sm />

    <x-modal :title="__('Create New Course')" wire x-on:open="setTimeout(() => $refs.name.focus(), 250)" size="4xl" blur
        center persistent>
        <form id="course-create" wire:submit="create" class="grid grid-cols-2 gap-4 sm:grid-cols-4">
            <div class="self-center col-span-1 sm:col-span-1">
                <div class="flex flex-row gap-4">
                    <x-radio label="{{__('Online')}}" value="online" wire:model="form.tipo" />
                    <x-radio label="{{ __('In-person') }}" value="presencial" wire:model="form.tipo" />
                </div>
            </div>

            <div class="self-center col-span-1 sm:col-span-1">
                <x-toggle label="{{__('Active')}}" lg wire:model="form.ativo" />
            </div>

            <div class="col-span-full sm:col-span-2">
                <x-input label="{{__('Name')}} *" wire:model="form.nome" x-ref="name" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <x-number label="{{__('Vacancies')}}" min="5" wire:model="form.vagas" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <x-currency label="{{__('Price')}}" locale="pt-BR" symbol wire:model="form.preco" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <x-date label="{{__('Begin')}}" format="DD/MM/YYYY" :min-date="now()"
                    wire:model.onchange.debounce="form.data_inicio" />
            </div>

            <div class="col-span-1 sm:col-span-1">
                <x-date label="{{__('Ends')}}" format="DD/MM/YYYY" :min-date="now()"
                    wire:model.onchange.debounce="form.data_fim" />
            </div>

            <div class="col-span-1 sm:col-span-1 space-y-4">
                <x-date label="{{__('Max Enrollment')}}" format="DD/MM/YYYY"
                    wire:model.onchange.debounce="form.data_max_matricula" :min-date="now()->addWeeks(2)" />
                <x-number label="{{__(key: 'Max Students')}}" min="5" wire:model="form.max_alunos" />
            </div>

            <div class="col-span-1 sm:col-span-3">
                <x-textarea label="{{__('Description')}}" rows="6" wire:model="form.descricao" />
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