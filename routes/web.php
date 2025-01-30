<?php

use App\Models\Nota;
use Illuminate\Support\Facades\Route;

Route::get('/notas', function () {
    $notas = Nota::all(); // Obtener todas las notas
    return view('notas.index', compact('notas')); // Pasar las notas a la vista
});

Route::post('/notas', function () {
    // Validar y crear la nueva nota
    request()->validate([
        'titulo' => 'required|string',
        'contenido' => 'required|string',
    ]);

    Nota::create([
        'titulo' => request('titulo'),
        'contenido' => request('contenido'),
    ]);

    return redirect('/notas'); // Redirigir al listado de notas después de guardar
})->name('notas.store');

// Ruta para eliminar una nota
Route::delete('/notas/{id}', function ($id) {
    $nota = Nota::findOrFail($id);
    $nota->delete();
    return redirect('/notas'); // Redirigir después de eliminar la nota
})->name('notas.destroy');

