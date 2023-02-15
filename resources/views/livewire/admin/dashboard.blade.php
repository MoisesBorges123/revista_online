<section class="section dashboard">
    <div class="row justify-content-center">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filtro</h6>
                      </li>
    
                      <li><button class="dropdown-item" wire:click='countRevista("mes")' >30 dias atrás</button></li>
                  <li><button class="dropdown-item" wire:click='countRevista("trimestre")'>03 meses atrás</button></button></li>
                  <li><button class="dropdown-item" wire:click='countRevista("semestre")' >06 meses atrás</button></li>
                    </ul>
                  </div>
              <div class="card-body">
                <h5 class="card-title">Revistas <span>| {{$headerCard1}}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book-half"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{str_pad($numPublicRevista,3,'0',STR_PAD_LEFT)}}</h6>
                    <span class="text-success small pt-1 fw-bold d-none">12%</span> <span class="d-none text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filtro</h6>
                  </li>
                  <li><button class="dropdown-item" wire:click="countArtigo('mes')" >30 dias atras</button></li>
                    <li><button class="dropdown-item" wire:click="countArtigo('trimestre')">03 meses atrás</button></li>
                    <li><button class="dropdown-item" wire:click="countArtigo('semestre')" >06 meses atrás</button></li>
                  
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Artigos  <span>| {{$headerCard2}}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-file-earmark-text"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{str_pad($numPublicArtigo,3,'0',STR_PAD_LEFT)}}</h6>
                    <span class="text-success small pt-1 fw-bold d-none">8%</span> <span class="d-none text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filtro</h6>
                    </li>

                    <li><button class="dropdown-item" wire:click="countAutores('mes')" >Mês</button></li>
                    <li><button class="dropdown-item" wire:click="countAutores('trimestre')">Trimestre</button></li>
                    <li><button class="dropdown-item" wire:click="countAutores('semestre')" >Semestre</button></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Autores <span>| {{$headerCard3}}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$numPublicAutores}}</h6>
                    <span class="text-danger small pt-1 fw-bold d-none">12%</span> <span class="text-muted small pt-2 ps-1 d-none">decrease</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->
          <div class="col-md-12">
            <img class='d-none d-sm-block d-sm-none d-md-block' style='width:85%'  src="{{asset('assets/img/illustrations/Statistics.svg')}}" alt="">
          </div>
         

         

          

        </div>
      </div><!-- End Left side columns -->

    

    </div>
  </section>