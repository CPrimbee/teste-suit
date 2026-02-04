<?php

use App\Livewire\Estudante\Index;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();

    $this->actingAs($this->user);
});

it('renders successfully', function () {
    Livewire::test(Index::class)
        ->assertStatus(200)
        ->assertViewIs('livewire.estudante.index');
});
