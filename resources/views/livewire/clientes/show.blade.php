<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded">
                <div class="card-header botton text-white">
                    <h4 class="mb-0">Detalhes do Cliente</h4>
                </div>

                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
                    <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>
                    <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
                    <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
                    <p><strong>Email:</strong> {{ $cliente->email }}</p>

                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
