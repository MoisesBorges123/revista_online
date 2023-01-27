<section class="section">
    <div class="row justify-content-center">
        <div class="col-md-8 com-sm-12">
            
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Alterar Cadastro Revista</h5>

          <!-- Multi Columns Form -->
          <form wire:submit.prevent="update" class="row g-3">
            <div class="col-md-6 div-sm-12">
                <label for="instituicao_id">Instituição</label>
                <select  wire:model='instituicao_id' class="form-control mb-3">
                    <option value=""> - Selecione - </option>
                    @if(!empty($instituicao))
                        @foreach($instituicao as $item)  
                            <option  value="{{$item->id}}">{{$item->nome_fantasia}}</option>                    
                        @endforeach
                    @endif
                </select>
                <div class="form-check form-switch mt-5">
                    <input class="form-check-input" value="1" type="checkbox" id="flexSwitchCheckChecked" wire:model='visivel'>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Visível</label>
                  </div>
            </div>
            
            <div class="col-md-6 cpl-sm-12">
                <div class="row">
                    @if ($newcapa)
                        <div class="col-md-12 col-sm-12 pl-5 pr-5 justfy-content-center text-center">
                            <div>
                                <div>
                                    <label for="">Pré-Visualização:</label> 
                                </div>
                                    <img src="{{ $newcapa->temporaryUrl() }}" class='img-preview-upload-revista' style="height:15rem; width:21rem; border-radius:2rem;">

                            </div>
                        </div>
                    @else
                    <div class="col-md-12 col-sm-12 pl-5 pr-5 justfy-content-center text-center">
                        <div>
                            <div>
                                <label for="">Pré-Visualização:</label> 
                            </div>
                                <img src="{{ $capa ?? ''}}" class='img-preview-upload-revista' style="height:15rem; width:21rem; border-radius:2rem;">

                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <label for="newcapa" class="form-label">Capa</label>
                        <input type="file" wire:model='newcapa' class="form-control @error('newcapa') is-invalid @enderror" id="newcapa">
                        @error('newcapa') <span class="text-danger error">{{ $message }}</span> @enderror
                        
                    </div>

                </div>
              </div>
            <div class="col-md-12">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" wire:model="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo">
              @error('titulo') <span class="text-danger error">{{ $message }}</span> @enderror              
            </div>
            <div class="col-md-12">
              <label for="subtitulo" class="form-label">Subtítulo</label>
              <input type="text" wire:model="subtitulo" class="form-control @error('subtitulo') is-invalid @enderror" id="subtitulo">
              @error('subtitulo') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="issn" class="form-label">ISSN</label>
              <input type="text" wire:model="issn" class="form-control @error('issn') is-invalid @enderror" id="issn">
              @error('issn') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="editor_responsavel" class="form-label">Editor Responsável</label>
              <input type="text" wire:model="editor_responsavel" class="form-control @error('editor_responsavel') is-invalid @enderror" id="editor_responsavel">
              @error('editor_responsavel') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
              <label for="inicio_publicacao"  class="form-label">Início Publicação</label>
              <input type="date" wire:model="inicio_publicacao" class="form-control @error('inicio_publicacao') is-invalid @enderror" id="mail">
              @error('inicio_publicacao') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
              <label for="periodicidade" class="form-label  @error('periodicidade') is-invalid @enderror">Periodicidade de Postagem de Artigos</label>
              <select name="periodicidade" id="periodicidade" wire:model="periodicidade" class="form-control">
                <option value=""> - Selecione - </option>
                <option value="Diário">Diário</option>
                <option value="Semanal">Semanal</option>
                <option value="Mensal">Mensal</option>
                <option value="Quinzenal">Quinzenal</option>
                <option value="Trienal">Trienal</option>
                <option value="Semestral">Semestral</option>
                <option value="Anual">Anual</option>
              </select>              
              @error('periodicidade') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>      
            <div class="col-md-6">
              <label for="qualis" class="form-label">QUALIS</label>
              <input type="text" wire:model='qualis' class="form-control @error('qualis') is-invalid @enderror" id="qualis">
              @error('qualis') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>                      
            <div class="col-md-6 col-sm-12">
                <label class='mb-2'>Áreas do Conhecimento</label>
                @if(!empty($areasConhecimentos))
                  @foreach($areasConhecimentos as $areaConhecimento)
                  <div class="form-check"> 
                    
                    <input class="form-check-input" wire:model="areaConhecimento_selected"  value="{{$areaConhecimento->id}}" type="checkbox" wire:key='{{$areaConhecimento->id}}' >                    
                    <label class="form-check-label" >
                      {{$areaConhecimento->nome}}
                    </label>
                  </div>
                  @endforeach
                @endif
                
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
