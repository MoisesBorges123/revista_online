
    <section id="hero" class="hero carousel  carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      <x-slot name='title'>Home</x-slot> 
      @if(!empty($revistas))
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row justify-content-center gy-6">              
              <div class="col-lg-5 col-md-8 ">
                <img src="{{asset('assets/img/home/revistaOnline.svg')}}" class="img-fluid animated">
              </div>  
              <div class="col-lg-9 text-center">
                <h2>Portal de Revistas Científicas</h2>
                <p>As revistas contidas nesse portal publicam artigos de investigação com temática livre, trabalhos de atualização, revisão de literatura e resenhas. Todos os artigos são originais.
                  O objetivo é atingir todos os públicos, graduandos, professores, pesquisadores das diferentes áreas de conhecimento.                  
                  Para a seleção dos artigos originais recebidos, o Editor Chefe e a Comissão Editorial usaram critérios contidos nas Normas para publicação.
                </p>                
                
              </div>  
            </div>
          </div>
        </div>
        @foreach($revistas as $revista)
        <div class="carousel-item">
          <div class="container">
            <div class="row justify-content-center gy-6">              
              <div class="col-md-8 col-sm-12 ">                
                <img src="{{asset(str_replace('\\','/',$revista->capa))}}" class="img-fluid animated img-carosel">
              </div>  
              <div class="col-lg-9 text-center">
                <h2>{{$revista->titulo}}</h2>
                <p>{{$revista->subtitulo}}</p>                
                <a href="{{route('artigos',['id'=>$revista->id])}}" class="btn-get-started scrollto">Detalhes</a>
              </div>  
            </div>
          </div>
        </div><!-- End Carousel Item -->
        @endforeach
      </div>
      @endif
  
      <a class="carousel-control-prev" href="#hero" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
  
      <a class="carousel-control-next" href="#hero" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
  
      <ol class="carousel-indicators"></ol>
  
    </section><!-- End Hero Section -->
