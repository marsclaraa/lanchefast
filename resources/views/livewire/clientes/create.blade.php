<div class="container">
    <div class="header">
        Vibe&Lanche
    </div>
    <div class="cadastro">
        Cadastre-se
    </div>

    <form wire:submit.prevent="store">
        <!-- Nome -->
        <div class="form-group " style="color: black">
            <label for="nome">Nome</label>
            <input type="text" id="nome" wire:model="nome" class="form-control @error('nome') is-invalid @enderror">
            @error('nome') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <!-- Endereço -->
        <div class="form-group"style="color: black">
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" wire:model="endereco" class="form-control @error('endereco') is-invalid @enderror">
            @error('endereco') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <!-- Telefone -->
        <div class="form-group"style="color: black">
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" wire:model="telefone" class="form-control @error('telefone') is-invalid @enderror">
            @error('telefone') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <!-- CPF -->
        <div class="form-group"style="color: black">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" wire:model="cpf" class="form-control @error('cpf') is-invalid @enderror">
            @error('cpf') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <!-- E-mail -->
        <div class="form-group"style="color: black">
            <label for="email">E-mail</label>
            <input type="email" id="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
            @error('email') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <!-- Senha -->
        <div class="form-group" style="color: black">
            <label for="password">Senha</label>
            <input type="password" id="password" wire:model="password" class="form-control @error('password') is-invalid @enderror">
            @error('password') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <!-- Botão de Enviar -->
        <div class="form-group text-center">
            <button type="submit" class="btn">Cadastrar</button>
        </div>
    </form>

    <!-- Mensagem de sucesso após cadastro -->
    @if (session()->has('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif
</div>