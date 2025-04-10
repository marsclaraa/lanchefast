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

Route::prefix('clientes')->group(function (){
    Route::get('/index', Index::class)->name('clientes.index');
    Route::get('/create', Create::class)->name('clientes.create');
    Route::get('/{cliente}/show', Show::class)->name('clientes.show');
    Route::get('/edit', Edit::class)->name('clientes.edit');
});

Route::prefix('produto')->group(function () {
    Route::get('/', ProdutoIndex::class)->name('produto.index');
    Route::get('/create', ProdutoCreate::class)->name('produto.create');
    Route::get('/{produto}', ProdutoShow::class)->name('produto.show');
    Route::get('/{produto}/edit', ProdutoEdit::class)->name('produto.edit');
});