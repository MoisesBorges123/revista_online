<div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-8 com-sm-12">
                <div class="card">
                
            <!--<img src="" class='card-img-top' style="border-radius:0.4rem;">-->
            <div class="card-body">              
                <div class="row">                                                                 
                    <div class="col-md-12 text-center">
                        <h2 class="card-title">Revista {{$artigo->revista->titulo}}</h2>
                        <h3 class='text-center'>{{$artigo->titulo}}</h3>
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
                        <b>Ano:</b> {{$artigo->ano}}
                    </p>
                    <p>
                        <b>Volume:</b> {{$artigo->volume}}
                    </p>
                    <p>
                        <b>Númefa-rotate-90:</b> {{$artigo->inicio_publicacao}}
                    </p>
                  
                    <p>
                        <b>Autores:</b>
                        @foreach($artigo->autores as $autor)
                            @if(!empty($autor->autor_correspondente))
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$autor->name}} - <small>(Autor Principal)</small></b> </p>
                            @else
                               <p>&nbsp;&nbsp;&nbsp;&nbsp;{{$autor->name}} </p>
                            @endif
                        @endforeach
                    </p>
                </div>        
                <div class="col-md-6">
                    <p>
                        <b>DOI: </b>{{$artigo->doi}}                    
                    </p>
                    <p>
                        <b>Publicado em: </b>{{$artigo->inicio_publicacao}}                    
                    </p>
                </div> 
                <div class="col-md-12">
                    <p>Resumo:</p>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <img class='flag' wire:click="lang('br')" src="{{asset('assets/img/flags/brasil.svg')}}" alt="Bandeira Brasil" data-toggle="tooltip" data-placement="top" title="Português">
                            <img class='flag' wire:click="lang('en')" src="{{asset('assets/img/flags/us.svg')}}" alt="Bandeira United States" data-toggle="tooltip" data-placement="top" title="Inglês">
                            <img class='flag' wire:click="lang('es')" src="{{asset('assets/img/flags/espanha.svg')}}" alt="Bandeira Espanha" data-toggle="tooltip" data-placement="top" title="Espanhol">
                        </div>
                    </div>
                    
                    <p>{{$resumo}}</p>
                </div>
                <div class="text-center">
                    <button type="button" wire:click="alterar('{{$artigo->id}}')" class="btn btn-large-1 btn-warning">Editar</button>              
                    <button type="button" wire:click="delete('{{$artigo->id}}')" class="btn btn-large-1 btn-danger">Excluir</button>              
                </div>
              </form><!-- End Multi Columns Form -->
    
            </div>
          </div>
    
            </div>
    
        </div>
        
    </section>
    
</div>

