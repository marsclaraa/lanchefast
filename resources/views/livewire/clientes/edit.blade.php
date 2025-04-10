<div wire:ignore.self class="modal fade" id="editModal" 
tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
    wire:listener="hideModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Cliente</h5>
                <button type="button" 
                class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group ">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" wire:model="nome" class="form-control @error('nome') is-invalid @enderror">
                    @error('nome') <span class="error-message">{{ $message }}</span> @enderror
                </div>
        
                <!-- Endereço -->
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" wire:model="endereco" class="form-control @error('endereco') is-invalid @enderror">
                    @error('endereco') <span class="error-message">{{ $message }}</span> @enderror
                </div>
        
                <!-- Telefone -->
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" wire:model="telefone" class="form-control @error('telefone') is-invalid @enderror">
                    @error('telefone') <span class="error-message">{{ $message }}</span> @enderror
                </div>
        
                <!-- CPF -->
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" wire:model="cpf" class="form-control @error('cpf') is-invalid @enderror">
                    @error('cpf') <span class="error-message">{{ $message }}</span> @enderror
                </div>
        
                <!-- E-mail -->
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" 
                class="btn btn-secondary"
                data-bs-dismiss="modal"
                >Cancelar</button>
                <button type="button"
                class="btn btn-primary"
                wire:click="salvar">Salvar</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            Livewire.on('fecharModalEdicao', function(){
                var modal = document.getElementById('editModal');
                var modalInstance = bootstrap.Modal.getInstance(modal);
                if(modalInstance){
                    modalInstance.hide();
                } else {
                 var newModal = new bootstrap.modal(modal);
                 newModal.hide();
                }
                document.querySelectorAll('.modal-backtrop')
                .forEach(el => el.remove());
                document.body.classList.remove('modal-open');
            });
        });
        </script>

        </div>