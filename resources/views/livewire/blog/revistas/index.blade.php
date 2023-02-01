<div>
  <section id="revistas" class="hero-static d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate" data-aos="zoom-out">
      <h2>Revistas</h2>
      <p>Últimas Publicações.</p>  
      <div class="d-flex" style='width:60%'>
        <input type="text" wire:model.debounce.500ms="search" placeholder="Pesquisar revista..." class="form-control input-search" type='search'>
        <!--<button wire:click="search" class="btn-none btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>-->
        <!--<button  class="btn-none glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>-->
      </div> 
      @if(!empty($instituicao->id))
      <div class="d-flex mb-5" style='width:60%'>
        <div class='badge badge-secondary'>
          <span>{{$instituicao->nome_fantasia}}</span>
          <span>
            <i class="bi bi-x text-danger" wire:click="unsetFilter({{$item}},reaconheciment)" ></i>
          </span>

        </div>
      </div>
      @endif   
      @if(!empty($filterSelectedLabel['areaconhecimento']))
      <div class="d-flex" style='width:60%'>
        @foreach($filterSelectedLabel['areaconhecimento'] as $item)
        <div class='badge badge-secondary'>
          <span>{{$item}}</span>
          <span>
            <i class="bi bi-x text-danger" wire:click="unsetFilter('{{$item}}','areaconhecimento')"></i>
          </span>
        </div>
        @endforeach       
      </div>
      @endif    
      @if(!empty($filterSelectedLabel['instituicao']))
      <div class="d-flex" style='width:60%'>
        @foreach($filterSelectedLabel['instituicao'] as $item)
        <div class='badge badge-secondary'>
          <span>{{$item}}</span>
          <span>
            <i class="bi bi-x text-danger" wire:click="unsetFilter('{{$item}}','instituicao')"></i>
          </span>
        </div>
        @endforeach       
      </div>
      @endif    
    </div>
    
  </section >
  <section id='filters'>
    <div class="container">
      <p wire:click="setFilter">
        <b>Filtrar</b>        
        <i class='bi bi-caret-down-fill @if($filter) d-none @endif'></i>
        <i class='bi bi-caret-up-fill @if(!$filter) d-none @endif'></i>
      </p>
      <div class="row filters @if(!$filter) d-none @endif">
        <div class="col-12 mb-4">
          <h5 class='text-primary'>Filtrar por...</h5>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form">
            <div class="form-group">
              <label for="instituicao">Instituição</label>
              <select name="instituicao" wire:model='filterInstituition' id="instituicao" class="form-control"> 
                <option value=""> - Selecione - </option>
                @forelse($instituicoes as $instituicoe)
                  @if(!in_array($instituicoe->id,$filterSelected['instituicao']))
                  <option value="{{$instituicoe->id}},{{$instituicoe->nome_fantasia}}">{{$instituicoe->nome_fantasia}}</option>
                  @endif
                @empty
                @endforelse
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form">
            <div class="form-group">
              <label for="areaconhecimento">Área do Conhecimento</label>
              <select name="areaconhecimento" wire:model='filterAreaConhecimento' id="areaconhecimento" class="form-control"> 
                <option value=""> - Selecione - </option>
                @forelse($areasdoconhecimento as $item)
                  @if(!in_array($item->id,$filterSelected['areaconhecimento']))
                  <option value="{{$item->id}},{{$item->nome}}">{{$item->nome}}</option>
                  @endif
                @empty
                @endforelse
              </select>
            </div>
          </div>
        </div>
        
      </div>
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
            areaID='{{$revista->areas_conhecimentos[0]->id ?? ""}}' 
            cod='{{$revista->id}}'
            >
          @endforeach
     
      </div>
  </section>

</div>
