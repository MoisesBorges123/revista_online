 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt=""> 
        <!--<h1>HeroBiz<span>.</span></h1> -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li><a class="nav-link scrollto" data-link="#home" href="{{route('home')}}"><span>Home</span></a></li>          
          <li><a class="nav-link scrollto" data-link="#instituicoes" href="{{route('instituicoes')}}">Instituições</a></li>
          <li><a class="nav-link scrollto" data-link="#artigos" href="{{route('artigos')}}">Artigos</a></li>
          <li><a class="nav-link scrollto" data-link="#revistas" href="{{route('revistas')}}">Revistas</a></li>
         
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      <a class="btn-getstarted scrollto" href="{{route('login')}}">Entrar</a>

    </div>
  </header><!-- End Header -->