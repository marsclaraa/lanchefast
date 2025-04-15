<div class="container mt-4">
 
    <div class="row mb-3">
        <div class="col-md-6  ">
            <h2 style="text-white text-shadow"><strong> Lista de Clientes </strong></h2>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn botton text-white rounded-full shadow hover:bg-purple-600" href="{{ route('clientes.create') }}">
                <i class="bi bi-plus-circle"></i> <strong> Novo Cliente</strong>
            </a>
        </div>
    </div>

    <div class="card m-10">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.debounce.300ms="search" 
                    class="form-control" placeholder="Buscar clientes...">
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>
                                    <a href="{{ route('clientes.show', $cliente->id) }}" 
                                        class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('clientes.edit', ['cliente'=> $cliente->id]) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <button wire:click="delete({{ $cliente->id }})" 
                                        class="btn btn-sm btn-danger" onclick="return 
                                        confirm('Tem certeza?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Nenhum cliente encontrado.</td>
                            </tr>
                        @endforelse
                      
                    </tbody>
                </table>
                
            </div>

            <div class="mt-3">
                {{ $clientes->links() }}

                
            </div>
        </div>
    </div>
</div>