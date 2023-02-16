<div  class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
    <div class="info">
        <h4>{{$nome}}</h4>        
    
        <div class="info-item d-flex">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h4>Local:</h4>
            <p>{{$endereco}}</p>
          </div>
        </div><!-- End Info Item -->
    
        <div class="info-item d-flex">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h4>E-mail:</h4>
            <p>{{$email}}</p>
          </div>
        </div><!-- End Info Item -->
    
        <div class="info-item d-flex">
          <i class="bi bi-phone flex-shrink-0"></i>
          <div>
            <h4>Telefone:</h4>
            <p>{{$telefone}}</p>
          </div>
        </div>
        <div class="info-item d-flex">
          <i class="bi bi-globe2 flex-shrink-0"></i>
          <div>
            <h4>Site:</h4>
            <a target="_blank" href="{{$site}}"><p>{{str_replace('https://','www.',$site)}}</p></a>
          </div>
        </div>
        <div class="info-item d-flex">
          <i class="bi book-half flex-shrink-0"></i>
          <div>
            <h4>Publicações:</h4>
            @if(!empty($publicacoes))
                {!! $publicacoes !!}                    
            @endif
          </div>
        </div>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                @if(!empty($publicacoes))          
                    <a class='btn btn-getstart' href="{{route('revistas',['id'=>$cod])}}">Revistas</a>
                @endif
                    
            </div>
        </div>
        <!-- End Info Item -->
    
      </div>
</div>

