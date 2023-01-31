<div>
    <section id="instituicoes" class="instituicoes hero-static d-flex align-items-center">
      <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate" data-aos="zoom-out">
        <h2>Instituições</h2>        
        <div class="d-flex" style='width:60%'>
          <input type="text" wire:model.debounce.500ms="search" placeholder="Pesquisar instituições..." class="form-control input-search" type='search'>
          <button wire:click="search" class="btn-none btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>
          <!--<button  class="btn-none glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Pesquisar</span></button>-->
        </div> 
      </div>
    </section>
    <section class='container contact'>
        <div class="row gy-5 gx-lg-5">
            @if(!empty($instituicoes) && count($instituicoes) > 0)
                
                    @foreach($instituicoes as $instituicao)                                            
                        <livewire:blog.instituicoes.card wire:key="{{$instituicao->id}}"
                        :telefone="$instituicao->telefone"
                        :email="$instituicao->email"
                        :nome="$instituicao->nome_fantasia"
                        :site="$instituicao->site"
                        :cnpj="$instituicao->cnpj"
                        :logo="$instituicao->logo"
                        :enderecomodel="$instituicao->endereco"
                        :numpublicacao="count($instituicao->revistas)"
                        :cod="$instituicao->id"
                        >                            
                        </livewire:blog.instituicoes.card>
                    @endforeach
              
            @else
                <h4>Essa Revista não possui artigos publicados.</h4>
            @endif
        </div>
    </section>  
  </div>
  