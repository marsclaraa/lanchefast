<?php

use App\Livewire\Clientes\Create;
use App\Livewire\Clientes\Edit;
use App\Livewire\Clientes\Index;
use App\Livewire\Clientes\Show;
use Illuminate\Support\Facades\Route;

Route::prefix('cliente')->group(function (){
    Route::get('/index', Index::class)->name('clientes.index');
    Route::get('/create', Create::class)->name('clientes.create');
    Route::get('/{cliente}/show', Show::class)->name('clientes.show');
    Route::get('/{cliente}/edit', Edit::class)->name('clientes.edit');
    
});
