<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProdutoCreate extends Component
{
    use WithFileUploads;

    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;
    
    protected $rules = [
        'nome' => 'required|max:255',
        'ingredientes' => 'required',
        'valor' => 'required|numeric', // use numeric aqui para maior compatibilidade
        'imagem' => 'nullable|image|max:2048',
    ];

    protected $messages = [
        'nome.required' => 'O nome é obrigatório.',
        'nome.max' => 'O limite máximo de caracteres foi atingido.',
        'ingredientes.required' => 'Os ingredientes são obrigatórios.',
        'valor.required' => 'O valor é obrigatório.',
        'valor.numeric' => 'O valor precisa ser numérico.',
        'imagem.image' => 'A imagem deve ser um arquivo do tipo imagem.',
        'imagem.max' => 'A imagem não pode ultrapassar 2MB.',
    ];

    public function create()
    {
        $this->validate();

        $caminhoImagem = $this->imagem ? $this->imagem->store('produtos', 'public') : null;

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $caminhoImagem,
        ]);

        session()->flash('success', 'Cadastro realizado com sucesso!');

        $this->reset(['nome', 'ingredientes', 'valor', 'imagem']);
    }

    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}
