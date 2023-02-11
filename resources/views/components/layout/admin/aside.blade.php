<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      
      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Painel</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Ações</li>
      @if(in_array(auth()->user()->perfi_id,[1,2]))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('instituicao')}}">
          <i class="bi bi-person"></i>
          <span>Instituições</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if(in_array(auth()->user()->perfi_id,[1,2,3]))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('revista')}}">
          <i class="bi bi-question-circle"></i>
          <span>Revistas</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      @endif
      @if(in_array(auth()->user()->perfi_id,[1,2,3,4]))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('artigo')}}">
          <i class="bi bi-envelope"></i>
          <span>Artigos</span>
        </a>
      </li>
      @endif
      <!-- End Contact Page Nav -->
<!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
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

      @if(in_array(auth()->user()->perfi_id,[1,2]))
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Configurações</span><i class="bi bigear-fill ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('areaestudo')}}">
              <i class="bi bi-circle bi-1"></i><span>Areas Conhecimento</span>
            </a>
          </li>
          @if(in_array(auth()->user()->perfi_id,[1]))
          <li>
            <a href="{{route('usuario')}}">
              <i class="bi bi-people bi-1"></i><span>Usuários</span>
            </a>
          </li>
          @endif
        </ul>
      </li><!-- End Configurações Nav -->
      @endif

    </ul>

  </aside><!-- End Sidebar-->