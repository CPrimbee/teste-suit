<?php

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('search')
    ->name('search.')
    ->group(function () {
        Route::get('/course', function (Request $request) {
            $selected = json_decode($request->get('selected', ''), true);

            return Curso::query()
                ->when(
                    $search = $request->get('search'),
                    fn($query) => $query->where('nome', 'like', "%{$search}%")
                )
                ->when(!$search && $selected, function ($query) use ($selected) {
                    // selecting the initial selected values
                    $query->whereIn('id', $selected)
                        // or selecting the other state ordered by creation date
                        ->orWhere(function ($query) use ($selected) {
                        $query->whereNotIn('id', $selected)
                            ->orderBy('created_at');
                    });
                })
                ->limit($search || $selected ? 50 : 10)
                ->get()
                ->map(fn(Curso $curso) => ['id' => $curso->id, 'nome' => $curso->nome, 'preco' => 'R$ ' . number_format($curso->preco / 100, 2, ',', '.')]);
        })->name('course');
    })->middleware('auth:sanctum');
