
    <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
      <h3 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target='#article-{{$cod}}' aria-expanded="false">            
            <div class="service-item position-relative">
                <div class="icon"></div>
                <h4><a href="" class="stretched-link"> {!! $icone !!} &nbsp;&nbsp;{{$titulo}}</a></h4>
                <div>
                    <b>Revista: {{$revista}}</b>
                </div>
               {!! $ano !!} 
               {!! $volume !!}
                {!! $numero !!}
                {!! $doi !!}
                {!! $datapublicacao !!}
                {!! $autor !!}
                
            </div>
        </button>
      </h3>
      <div id='article-{{$cod}}' class="accordion-collapse collapse" data-bs-parent="#faqlist" style="">
        <div class="accordion-body"> 
            <div class="row">
                <div class="col-md-12 col-sm-12 text-right mb-3">
                    <img class='flag' wire:click="lang('pt-br',{{$cod}})" src="{{asset('assets/img/flags/brasil.svg')}}" alt="Bandeira Brasil" data-toggle="tooltip" data-placement="top" title="Português">
                    <img class='flag' wire:click="lang('en',{{$cod}})" src="{{asset('assets/img/flags/us.svg')}}" alt="Bandeira United States" data-toggle="tooltip" data-placement="top" title="Inglês">
                    <img class='flag' wire:click="lang('es',{{$cod}})" src="{{asset('assets/img/flags/espanha.svg')}}" alt="Bandeira Espanha" data-toggle="tooltip" data-placement="top" title="Espanhol">
                </div>
                <div class="col-md-12 col-sm-12">
                    <p class='text-justify recuo'>
                        @if($lang=='pt-br')
                            {{$resumeportugues}}
                        @elseif($lang=='en')
                            {{$resumeingles}}
                        @elseif($lang=='es')
                            {{$resumespanhol}}       
                        @else
                            {{$resumeportugues }}       
                        @endif    
                    </p>
                </div>
                <div class="col-md-12 col-sm-12">
                    <a href="{{$linkexterno}}" target="_blank" class="btn btn-primary">Ler Mais</a>
                </div>
            </div>           
        </div>
      </div>
    </div><!-- # Faq item-->
