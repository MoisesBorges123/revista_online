<div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-8 com-sm-12">
                <div class="card">
                
            <img src="{{ $revista->capa ?? ''}}" class='card-img-top' style="border-radius:0.4rem;">
            <div class="card-body">              
                <div class="row">                                                                 
                    <div class="col-md-12 text-center">
                        <h2 class="card-title">Revista {{$revista->titulo}}</h2>
                        <p class='text-center'>{{$revista->subtitulo}}</p>
                    </div>   
                    <div class="col-md-12 text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <hr class='text-center'>
                            </div>
                        </div>
                        
                    </div>                            
                <div class="col-md-6">
                    <p>
                        <b>Publicada em:</b> {{$revista->inicio_publicacao}}
                    </p>

                    <p>
                        <b>Editor(a): </b>{{$revista->editor_responsavel}}                    
                    </p>
                    <p>
                        <b>Periodicidade: </b>{{$revista->periodicidade}}                    
                    </p>
                    <p>
                        <b>Categoria:</b>
                        @foreach($revista->areas_conhecimentos as $area)
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{$area->nome}}</p>
                        @endforeach
                    </p>
                </div>        
                <div class="col-md-6">
                    <p>
                        <b>ISSN: </b>{{$revista->issn}}                    
                    </p>
                    <p>
                        <b>QUALIS: </b>{{$revista->qualis}}                    
                    </p>
                </div>                                
                <div class="text-center">
                    <button type="button" wire:click="alterar('{{$revista->id}}')" class="btn btn-large-1 btn-warning">Editar</button>              
                    <button type="button" wire:click="delete('{{$revista->id}}')" class="btn btn-large-1 btn-danger">Excluir</button>              
                </div>
              </form><!-- End Multi Columns Form -->
    
            </div>
          </div>
    
            </div>
    
        </div>
        
    </section>
    
</div>
