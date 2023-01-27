<section class="section">
    <div class="row justify-content-center">
        <div class="col-md-8 com-sm-12">
            
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cadastrar Area de Conhecimento</h5>

          <!-- Multi Columns Form -->
          <form wire:submit.prevent="store" class="row g-3">
          
            <div class="col-md-12">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" wire:model="nome" class="form-control @error('nome') is-invalid @enderror" id="nome">
              @error('nome') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="icone" class="form-label">Icone</label>
              <input type="text" wire:model="icone" class="form-control @error('icone') is-invalid @enderror" id="icone">
              @error('icone') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-large-1 btn-primary">Salvar</button>              
            </div>
          </form><!-- End Multi Columns Form -->

        </div>
      </div>

        </div>

    </div>
    
</section>
