<div class="flex items-center justify-center min-h-screen px-4 py-8 fundo">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl w-full">

        {{-- Imagem e texto da esquerda --}}
        <div class="flex flex-col items-center justify-center text-center">
            <img src="{{ asset('img/lanche.png') }}" alt="Burger" class="w-48 mb-6">
            <h2 class="text-2xl text-[#a415a4]" style="font-family: 'Chewy', cursive;">
                <strong>SEJA UM CLIENTE<br>VIBE & LANCHE</strong>
            </h2>
        </div>

        {{-- Formulário de cadastro --}}
        <div class="card rounded-2xl shadow-lg p-6 border border-black max-w-md w-full card">

            {{-- Toasts de Erro --}}
            @if ($errors->any())
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                    class="fixed top-6 right-6 z-50 space-y-2">
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg animate-fade-in">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif

            <form wire:submit.prevent="create" class="space-y-4">

                <div>
                    <label class="font-semibold">Nome:</label>
                    <input type="text" wire:model.defer="nome"
                        class="w-full border-2 rounded-full px-4 py-2 border-black focus:outline-none">
                    @error('nome')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="font-semibold">Ingredientes</label>
                    <textarea type="text" wire:model.defer="ingredientes"
                     rows="5"class="form-control w-full border-2  px-4 py-2 border-black focus:outline-none">
                    </textarea>
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="font-semibold">Valor</label>
                    <input type="number" wire:model.defer="valor"
                        class="w-full border-2 rounded-full px-4 py-2 border-black focus:outline-none">
                    @error('cpf')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem do Produto</label>
                    <input type="file" wire:model="imagem" class="form-control" id="imagem">
                    @error('imagem') <small class="text-danger">{{ $message }}</small> @enderror

                    @if ($imagem)
                        <div class="mt-3">
                            <p><strong>Prévia da imagem:</strong></p>
                            <img src="{{ $imagem->temporaryUrl() }}" class="img-fluid rounded shadow" style="max-height: 200px;">
                        </div>
                    @endif
                </div>

            
                <div class="text-center">
                    <button type="submit"
                        class="botton text-white font-bold px-6 py-2 rounded-full shadow hover:bg-purple">
                        Cadastrar
                    </button>
                </div>
            </form>

            @if (session()->has('success'))
                <div class="text-green-600 text-sm text-center mt-2">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
