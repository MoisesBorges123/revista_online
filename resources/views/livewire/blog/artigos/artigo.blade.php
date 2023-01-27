<div>
    <section id="revistas" class="hero-static d-flex align-items-center">
      <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate" data-aos="zoom-out">
        <h2>Artigos</h2>
        <p>Revista {{$revista->titulo}}</p>  
        <div class="d-flex" style='width:60%'>
          <input type="text" wire:model.debounce.500ms="search" placeholder="Pesquisar artigos..." class="form-control input-search" type='search'>
          <button wire:click="search" class="btn-none btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>
          <!--<button  class="btn-none glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>-->
        </div> 
      </div>
    </section>
    <section  class="artigos" >
        <div class="container aos-init aos-animate"  data-aos="zoom-out" data-aos-delay="200">    
            @foreach($artigos as $artigo)      
    
    <x-blog.artigos.card 
    :titulo="$artigo->titulo"
    :volume="$artigo->volume"
    :numero="$artigo->numero"
    :doi="$artigo->doi"
    :datapublicacao="$artigo->inicio_publicacao"
    :resumoportugues="$artigo->resumo_portugues"
    :resumoingles="$artigo->resumo_ingles"
    :resumoespanhol="$artigo->resumo_espanhol"
    :ano="$artigo->ano" 
    :icone="$revista->areas_conhecimentos"
    />    
        
     @endforeach
        </div>
    </section>  
  </div>
  