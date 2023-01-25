<section class="section">
    <div class="row justify-content-center">
        <div class="col-md-8 com-sm-12">
            
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cadastrar Artigo</h5>

          <!-- Multi Columns Form -->
          <form wire:submit.prevent="update" class="row g-3">
            <div class="col-12">
                <label for="titulo" class="form-label">Título Artigo</label>
                <input type="text" wire:model='titulo' class="form-control @error('titulo') is-invalid @enderror" id="titulo">
                @error('titulo') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 div-sm-12">
                <label for="revista_id">Revista</label>
                <select name="revista_id" id="revista_id" wire:model='revista_id' class="form-control mt-1">
                    <option value=""> - Selecione - </option>
                    @if(!empty($revista))
                        @foreach($revista as $item)
                            <option value="{{$item->id}}">{{$item->titulo}}</option>                    
                        @endforeach
                    @endif
                </select>
            </div>           
            <div class="col-md-12">
              <label for="ano" class="form-label">Ano</label>
              <input type="text" wire:model="ano" class="form-control @error('ano') is-invalid @enderror" id="ano">
              @error('ano') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="volume" class="form-label">Volume</label>
              <input type="text" wire:model="volume" class="form-control @error('volume') is-invalid @enderror" id="volume">
              @error('volume') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="volume" class="form-label">Numero Artigo</label>
              <input type="text" wire:model="numero" class="form-control @error('numero') is-invalid @enderror" id="numero">
              @error('numero') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="autor_correspondente" class="form-label">{{$novo}} Autor Correspondente</label>
              <input type="text" wire:model="autor_correspondente" class="form-control @error('autor_correspondente') is-invalid @enderror" id="autor_correspondente">              
              @error('autor_correspondente') <span class="text-danger error">{{ $message }}</span> @enderror
              <div class="form-check form-switch">
                <input class="form-check-input" wire:model="updateAutor" type="checkbox" id="flexSwitchCheckChecked" >
                <label class="form-check-label" for="flexSwitchCheckChecked">Apenas atualizar dados do autor</label>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="email_autor_correspondente" class="form-label">E-mail</label>
              <input type="text" wire:model="email_autor_correspondente" class="form-control @error('email_autor_correspondente') is-invalid @enderror" id="email_autor_correspondente">
              @error('email_autor_correspondente') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="doi" class="form-label">DOI</label>
              <input type="text" wire:model="doi" class="form-control @error('doi') is-invalid @enderror" id="doi">
              @error('doi') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="link_externo" class="form-label">Link do Artigo</label>
              <input type="url" wire:model="link_externo" class="form-control @error('link_externo') is-invalid @enderror" id="link_externo">
              @error('link_externo') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="palavra_chave" class="form-label">Palavras Chaves</label>
              <textarea wire:model='palavra_chave' name="palavra_chave" id="palavra_chave" cols="10" rows="10" class="form-control @error('link_externo') is-invalid @enderror" placeholder="Ex: palavra_1, palavra_2, palavra_3..."></textarea>              
              @error('palavra_chave') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="resumo_portugues" class="form-label">Resumo Portugues</label>
              <textarea wire:model='resumo_portugues' name="resumo_portugues" id="resumo_portugues" cols="10" rows="10" class="form-control @error('resumo_portugues') is-invalid @enderror" placeholder="Resumo Portugues"></textarea>              
              @error('resumo_portugues') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="resumo_espanhol" class="form-label">Resumo Espanhol</label>
              <textarea wire:model='resumo_espanhol' name="resumo_espanhol" id="resumo_espanhol" cols="10" rows="10" class="form-control @error('resumo_espanhol') is-invalid @enderror" placeholder="Resumo Portugues"></textarea>              
              @error('resumo_espanhol') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="resumo_ingles" class="form-label">Resumo Inglês</label>
              <textarea wire:model='resumo_ingles' name="resumo_ingles" id="resumo_ingles" cols="10" rows="10" class="form-control @error('resumo_ingles') is-invalid @enderror" placeholder="Resumo Portugues"></textarea>              
              @error('resumo_ingles') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
              <label for="inicio_publicacao"  class="form-label">Início Publicação</label>
              <input type="date" wire:model="inicio_publicacao" class="form-control @error('inicio_publicacao') is-invalid @enderror" id="mail">
              @error('inicio_publicacao') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>            
            <div class="text-center">
              <button type="submit" class="btn btn-large-1 btn-warning">Alterar</button>              
            </div>
          </form><!-- End Multi Columns Form -->

        </div>
      </div>

        </div>

    </div>
    
</section>
