<?php

use App\Livewire\Curso\Index;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();

    $this->actingAs($this->user);
});

it('renders successfully', function () {
    Livewire::test(Index::class)
        ->assertStatus(200)
        ->assertViewIs('livewire.curso.index');
});
