<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class Show extends Component
{
    public $cliente;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function render()
    {
        return view('livewire.clientes.show');
    }
}
