<div class='row'>
    <div class="col-12">
        <form method="POST" >
            <div class="row">
                <div class="form-group col-md-4 col-sm-12">
                    <label for="name">Nome</label>
                    <input type="text"  wire:model="nome" class="form-control @error('nome') is-invalid @enderror">
                    @error('nome') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>        
                <div class="form-group col-md-4 col-sm-12">
                    <label for="email">E-mail</label>
                    <input type="email"  wire:model="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>            
                <div class="col md-4">
                    <div class="form-check form-switch mt-4 pt-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:model="autor_correspondente">
                        <label class="form-check-label" style='font-size:0.9rem' for="flexSwitchCheckChecked">Autor Principal</label>
                    </div>
                </div>
                <div class="form-group col-md-2 mt-4">
                    <button type='button' wire:click='store' class="btn btn-primary">Salvar</button>
                </div>
            </div>
        
        
        </form>

    </div>
    <script>
        window.location.href='#artigo';
    </script>
</div>
