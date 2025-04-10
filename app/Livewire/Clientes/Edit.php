<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $clienteId; // Definindo a variável para o ID do cliente
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $password; // Verifique se a senha é opcional ou obrigatória

    protected $listeners = [
        'editarCliente', // Listener para editar o cliente
        'closeEditModal' => 'fecharModal'
    ];

    // Mensagens de erro personalizadas
    protected $messages = [
        'nome.required' => 'O campo nome é obrigatório.',
        'endereco.required' => 'O campo endereço é obrigatório.',
        'telefone.required' => 'O campo telefone é obrigatório.',
        'cpf.required' => 'O campo CPF é obrigatório.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'Formato de e-mail inválido.',
        'password.min' => 'A senha precisa ter no mínimo 6 caracteres.',
    ];

    public function render()
    {
        return view('livewire.clientes.edit');
    }

    // Método para editar o cliente
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
        }

        $this->dispatch('openEditModal');
    }

    // Método para salvar as alterações
    public function salvar()
    {
        // Regras de validação dinâmicas, usando $this->clienteId
        $rules = [
            'nome' => 'required|max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'required|max:15',
            'cpf' => 'required|max:14|unique:clientes,cpf,' . $this->clienteId,
            'email' => 'required|email|unique:clientes,email,' . $this->clienteId,
            'password' => 'nullable|min:6|confirmed', // Senha pode ser opcional
        ];

        // Validando os dados de entrada com as regras
        $this->validate($rules);

        $cliente = Cliente::find($this->clienteId);

        if ($cliente) {
            // Atualiza os dados do cliente
            $cliente->update([
                'nome' => $this->nome,
                'endereco' => $this->endereco,
                'telefone' => $this->telefone,
                'cpf' => $this->cpf,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $cliente->password, // Atualiza a senha se fornecida
            ]);

            // Dispara eventos após o cadastro
            $this->dispatch('cadastroAtualizado');
            $this->dispatch('fecharModalEdicao');

            session()->flash('message', 'Cadastro Atualizado com sucesso!');
        }
    }

    // Método para fechar o modal de edição
    public function fecharModal()
    {
        $this->reset(); // Reseta os dados após o fechamento do modal
    }
}
