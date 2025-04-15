<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $clienteId;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $password;
    public $password_confirmation;

    protected $listeners = [
        'editarCliente',
        'closeEditModal' => 'fecharModal'
    ];

    protected $messages = [
        'nome.required' => 'O campo nome é obrigatório.',
        'endereco.required' => 'O campo endereço é obrigatório.',
        'telefone.required' => 'O campo telefone é obrigatório.',
        'cpf.required' => 'O campo CPF é obrigatório.',
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'Formato de e-mail inválido.',
        'password.min' => 'A senha precisa ter no mínimo 6 caracteres.',
        'password.confirmed' => 'A confirmação da senha não confere.',
    ];

    public function render()
    {
        return view('livewire.clientes.edit');
    }

    public function editarCliente($clienteId)
    {
        $cliente = Cliente::find($clienteId);

        if ($cliente) {
            $this->clienteId = $cliente->id;
            $this->nome = $cliente->nome;
            $this->endereco = $cliente->endereco;
            $this->telefone = $cliente->telefone;
            $this->cpf = $cliente->cpf;
            $this->email = $cliente->email;

            $this->dispatchBrowserEvent('openEditModal');
        }
    }

    public function mount($cliente){
        $cliente = Cliente::find($cliente);

        if($cliente){
            $this->clienteId = $cliente->id;
            $this->nome = $cliente->nome;
            $this->endereco = $cliente->endereco;
            $this->telefone = $cliente->telefone;
            $this->cpf = $cliente->cpf;
            $this->email = $cliente->email;
        } else {
            return redirect()->route('clientes.index')->with(['message'=>'cliente não encontrado.']);
        }

    }

    public function salvar()
    {
        $this->validate([
            'nome' => 'required|max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'required|max:15',
            'cpf' => 'required|max:14|unique:clientes,cpf,' . $this->clienteId,
            'email' => 'required|email|unique:clientes,email,' . $this->clienteId,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $cliente = Cliente::findOrFail($this->clienteId);

        $dadosAtualizados = [
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
        ];

        if ($this->password) {
            $dadosAtualizados['password'] = Hash::make($this->password);
        }

        $cliente->update($dadosAtualizados);

        $this->dispatch('cadastroAtualizado');
        $this->dispatchBrowserEvent('fecharModalEdicao');

        session()->flash('message', 'Cadastro atualizado com sucesso!');
        $this->reset();
    }

    public function fecharModal()
    {
        $this->reset();
    }
}
