  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
       <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn d-block d-xl-none"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">    

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            @if(!empty($alerts) && count($alerts) > 0)
                <span class="badge bg-primary badge-number">{{count($alerts)}}</span>
            @endif
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            @if(count($alerts)>0)
                <li class="dropdown-header">
                    @if(count($alerts) == 1)
                        Você tem {{count($alerts)}} notificação.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="bi bi-bell"></span>
                    @else
                        Você tem {{count($alerts)}} notificações.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="bi bi-bell-fill"></span>
                    @endif
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                @foreach($alerts as $alert)
                    <li class="notification-item">
                        @switch($alert->tipo)
                            @case('danger')
                                <i class="bi bi-x-circle text-warning"></i>
                                @break
                            @case('info')
                                <i class="bi bi-info-circle text-info"></i>
                                @break
                            @case('warning')
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                @break
                            @case('success')
                                <i class="bi bi-check-circle text-success"></i>
                                @break
                            @default
                                <i class="bi bi-bell text-primary"></i>
                        @endswitch
                    <div>
                        <h4>{{$alert->titulo}}</h4>
                        <p>{{$alert->mensagem}}</p>
                        <p wire:click='delete({{$alert->id}})' class='text-danger mt-3 btn btn-link'>Fechar</p>
                    </div>
                    </li>
        
                    <li>
                    <hr class="dropdown-divider">
                    </li>
                @endforeach
            @else
                <li class="dropdown-header">
                Você não possui notificações. &nbsp;&nbsp;
                <span class="bi bi-bell-slash-fill"></span>             
                </li>
            @endif
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
    

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{auth()->user()->name}}</h6>
              <span>{{auth()->user()->perfil->nome}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('usuario.profile')}}">
                <i class="bi bi-person"></i>
                <span>Meu Perfil</span>
              </a>
            </li>
            
           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="dropdown-item d-flex align-items-center">
                  <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
                </button>

              </form>             
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->