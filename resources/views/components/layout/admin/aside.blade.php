<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Painel</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Ações</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('instituicao')}}">
          <i class="bi bi-person"></i>
          <span>Instituição</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('revista')}}">
          <i class="bi bi-question-circle"></i>
          <span>Revistas</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('artigo')}}">
          <i class="bi bi-envelope"></i>
          <span>Artigos</span>
        </a>
      </li><!-- End Contact Page Nav -->
<!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('banner')}}">
          <i class="bi bi-card-list"></i>
          <span>Mural</span>
        </a>
      </li>
    --><!-- End Register Page Nav -->
<!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Posts</span>
        </a>
      </li>End Login Page Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Configurações</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('areaestudo')}}">
              <i class="bi bi-circle"></i><span>Areas Conhecimento</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Configurações Nav -->


    </ul>

  </aside><!-- End Sidebar-->