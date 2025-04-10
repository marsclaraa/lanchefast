<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $password;

    protected $rules = [
        'nome' => 'required|max:255',
        'endereco' => 'required|max:255',
        'telefone' => 'required|max:15',
        'cpf' => 'required|max:14|unique:clientes,cpf',
        'password' => 'required|min:6',
        'email' => 'required|email|unique:clientes|max:255'

    ];

    protected $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.max' => 'O limite maxímo de caracteres foi atingido',
        'email.required' => 'O e-mail é obrigatório',
        'email.email' => 'Formato de e-mail inválido',
        'cpf.unique' => 'Este CPF já está cadastrado',
        'email.max' => 'O limite maxímo de caracteres foi atingido',
        'cpf.required' => 'O campo CPF é obrigatório',
        'cpf.max' => 'O limite maxímo de caracteres foi atingido',
        'telefone.required' => 'O numero de telefone é obrigatório',
        'telefone.max' => 'O máximo de caracteres é 15',
        'password.required' => 'A senha obrigatória',
        'password.min' => 'A senha precisa ter mais de 6 caracteres',
        'endereco.required' => 'O campo endereco é obrigatório',
        'endereco.max' => 'O limite maxímo de caracteres foi atingido'
    ];

    public function store()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Cadastro Realizado!');

        // Limpar os campos após o cadastro
        $this->reset(['nome', 'endereco', 'telefone', 'cpf', 'email', 'password']);
    }

    public function render()

    {
        return view('livewire.clientes.create');
    }
}
