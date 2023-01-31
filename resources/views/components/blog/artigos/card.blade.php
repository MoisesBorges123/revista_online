<div class="accordion accordion-flush px-xl-5" id="faqlist">
  <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
    <h3 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1" aria-expanded="false">
          <div class="service-item position-relative">
              <div class="icon"></div>
              <h4><a href="" class="stretched-link"> {!! $icone !!} &nbsp;&nbsp;{{$titulo}}</a></h4>
             {!! $ano !!} 
             {!! $volume !!}
              {!! $numero !!}
              {!! $doi !!}
              {!! $datapublicacao !!}
              {!! $autor[0]->name ?? '' !!}              
              
          </div>
      </button>
    </h3>
    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist" style="">
      <div class="accordion-body">
        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
      </div>
    </div>
  </div><!-- # Faq item-->

</div>