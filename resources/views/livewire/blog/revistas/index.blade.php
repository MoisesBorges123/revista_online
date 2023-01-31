<div>
  <section id="revistas" class="hero-static d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate" data-aos="zoom-out">
      <h2>Revistas</h2>
      <p>Últimas Publicações.</p>  
      <div class="d-flex" style='width:60%'>
        <input type="text" wire:model.debounce.500ms="search" placeholder="Pesquisar revista..." class="form-control input-search" type='search'>
        <button wire:click="search" class="btn-none btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>
        <!--<button  class="btn-none glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>-->
      </div> 
      @if(!empty($instituicao->id))
      <div class="d-flex" style='width:60%'>
        <div class='badge badge-secondary'>
          <span>{{$instituicao->nome_fantasia}}</span>
          <span>
            <i class="bi bi-x text-danger" wire:click="unsetinstituicao"></i>
          </span>

        </div>
      </div>
      @endif
    </div>
  </section>
  <section  class="services " >
      <div class="container aos-init aos-animate"  data-aos="zoom-out" data-aos-delay="200">
  
        <!--<div class="section-header">
          <h2>Revistas</h2>
          <p>Últimas publicações.</p>
        </div>-->
  
        <div class="row gy-5">
          @foreach($revistas as $revista) 
          
            <livewire:blog.revistas.card wire:key="{{$revista->id}}"
            img='{{$revista->capa}}' 
            titulo='{{$revista->titulo}}' 
            subtitulo='{{$revista->subtitulo}}'  
            instituicao='{{$revista->instituicao->nome_fantasia}}' 
            icone='{{$revista->areas_conhecimentos[0]->icone ?? ""}}'
            area='{{$revista->areas_conhecimentos[0]->nome ?? ""}}' 
            cod='{{$revista->id}}'
            >
          @endforeach
     
      </div>
  </section>

</div>
