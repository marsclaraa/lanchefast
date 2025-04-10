<?php

use App\Livewire\Clientes\Create;
use App\Livewire\Clientes\Edit;
use App\Livewire\Clientes\Index;
use App\Livewire\Clientes\Show;
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;
use App\Livewire\Produto\ProdutoShow;
use Illuminate\Support\Facades\Route;

Route::prefix('cliente')->group(function (){
    Route::get('/index', Index::class)->name('clientes.index');
    Route::get('/create', Create::class)->name('clientes.create');
    Route::get('/{cliente}/show', Show::class)->name('clientes.show');
    Route::get('/{cliente}/edit', Edit::class)->name('clientes.edit');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', ProdutoIndex::class)->name('produtos.index');
    Route::get('/create', ProdutoCreate::class)->name('produtos.create');
    Route::get('/{produto}', ProdutoShow::class)->name('produtos.show');
    Route::get('/{produto}/edit', ProdutoEdit::class)->name('produtos.edit');
});