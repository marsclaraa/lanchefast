<div class="container mt-5 d-flex justify-content-center">
    <!-- Título da Página -->
    <div class="row mb-4 text-align-center ">
            <h2 class="text-align-center text-dark font-weight-bold"><strong> Editar Cliente </strong></h2>
        </div>


    <!-- Mensagem de Sucesso -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card de Edição -->
    <div class="card shadow-sm" style="max-width: 600px; width: 100%; margin: 0 auto;">
        <div class="card-body">
            <form wire:submit.prevent="salvar">
                
                <!-- Nome -->
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" wire:model.defer="nome" placeholder="Digite o nome do cliente">
                    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Endereço -->
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="endereco" wire:model.defer="endereco" placeholder="Digite o endereço do cliente">
                    @error('endereco') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Telefone -->
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" wire:model.defer="telefone" placeholder="Digite o telefone do cliente">
                    @error('telefone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- CPF -->
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" wire:model.defer="cpf" placeholder="Digite o CPF do cliente">
                    @error('cpf') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- E-mail -->
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model.defer="email" placeholder="Digite o e-mail do cliente">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Nova Senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">Nova Senha (opcional)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model.defer="password" placeholder="Digite a nova senha (opcional)">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Confirmação da Senha -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmação da Senha</label>
                    <input type="password" class="form-control" id="password_confirmation" wire:model.defer="password_confirmation" placeholder="Confirme a senha">
                </div>

                <!-- Botão de Salvar -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn botton text-white px-5 py-2">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
