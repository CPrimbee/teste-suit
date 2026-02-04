<?php

use App\Livewire\Curso\Index as CursoIndex;
use App\Livewire\Estudante\Index as EstudanteIndex;
use App\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/user/profile', Profile::class)->name('user.profile');

    Route::get('/cursos', CursoIndex::class)->name('curso.index');
    Route::get('/estudantes', EstudanteIndex::class)->name('estudante.index');
});

require __DIR__ . '/auth.php';
