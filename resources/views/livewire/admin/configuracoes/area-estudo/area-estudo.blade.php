<div>
    <div class="pagetitle">
        <h1>Areas do Conhecimento</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Layouts</li>
          </ol>
        </nav>
      </div>
      <div class='row justfy-content-left'>
          @if($window == 'index')
          <div class="col-2 mb-5">
              <button class="btn btn-primary" wire:click="setWindow('create')">
                  <span class="bi bi-plus-circle"></span> Adicionar
              </button>
          </div>
          @elseif($window == 'create')
          <div class="col-2 mb-5">
              <button class="btn btn-secondary" wire:click="setWindow('index')">
                  <span class="bi bi-list"></span> Cadastrados
              </button>
          </div>
          @elseif($window == 'edit')
          <div class="col-2 mb-5">
            <button class="btn btn-danger" wire:click="setWindow('index')">
                <span class="bi bi-arrow-90deg-left"></span> Voltar
            </button>
        </div>
          @endif
      </div>
    @if($window =='index')      
        <livewire:admin.configuracoes.area-estudo.index></livewire:admin.configuracoes.area-estudo.index>        
    @elseif($window == 'show')
        <livewire:admin.configuracoes.area-estudo.show></livewire:admin.configuracoes.area-estudo.show>  
    @elseif($window == 'create')
        <livewire:admin.configuracoes.area-estudo.create></livewire:admin.configuracoes.area-estudo.create>
    @elseif($window == 'edit')
        <livewire:admin.configuracoes.area-estudo.edit id="{{$selectedID}}"></livewire:admin.configuracoes.area-estudo.edit>
    @endif
    <livewire:admin.configuracoes.area-estudo.delete></livewire:admin.configuracoes.area-estudo.delete>
</div>

