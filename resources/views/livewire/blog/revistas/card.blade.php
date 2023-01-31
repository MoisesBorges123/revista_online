<div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
    <div class="service-item">
      <div class="img">
        <img src="{{asset($img)}}" class="img-fluid" alt="">
      </div>
      <div class="details position-relative">
        <div class="icon">
          {!! empty(!$icone) ? html_entity_decode($icone) : '<i class="bi bi-chat-square-text"></i>' !!}
        </div>
        <a href="{{route('artigos',['id'=>$cod])}}" class="stretched-link">
          <h3>{{$titulo}}</h3>
        </a>
        <p>{{$subtitulo}}</p>
        <p>{{$instituicao}}</p>
        <p>{{empty($area) ? '' : 'Área: '.$area}}</p>
      </div>
    </div>
  </div>