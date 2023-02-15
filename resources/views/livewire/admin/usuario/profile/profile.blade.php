<div>
    <div class="pagetitle">
        <h1>Usuário</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel</a></li>
            <li class="breadcrumb-item">Usuário</li>            
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
  
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
  
                <img src="{{asset('assets/img/avatars/user.svg')}}" alt="Profile" class="rounded-circle">
                <h2>{{auth()->user()->name}}</h2>
                <h3>{{auth()->user()->perfil->nome}}</h3>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
  
          </div>
  
          <div class="col-xl-8">
  
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
  
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Sobre</button>
                  </li>
                  @if(auth()->user()->perfi_id == 3)
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Alterar cadastro</button>
                 </li>
                 @endif
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alterar Senha</button>
                  </li>
  
                </ul>
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Sobre</h5>
                    <p class='text-justify'>
                       &nbsp;&nbsp;&nbsp; As revistas contidas nesse portal publicam artigos de investigação com temática livre, trabalhos de atualização, revisão de literatura e resenhas. Todos os artigos são originais. O objetivo é atingir todos os públicos, graduandos, professores, pesquisadores das diferentes áreas de conhecimento. Para a seleção dos artigos originais recebidos, o Editor Chefe e a Comissão Editorial usaram critérios contidos nas Normas para publicação.
                    </p>
                    <p class="small fst-italic">Usuário criado pela Alfaunipac.</p>
                    @if(auth()->user()->perfi_id == 3)
                        <h5 class="card-title">Detalhes</h5>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label ">Instituição</div>
                          <div class="col-lg-9 col-md-8">{{auth()->user()->instituicoes[0]->nome_fantasia ?? 'AlfaUnipac'}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">CNPJ</div>
                          <div class="col-lg-9 col-md-8">{{auth()->user()->instituicoes[0]->cnpj ?? ''}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Endereço</div>
                          <div class="col-lg-9 col-md-8">
                            {{auth()->user()->instituicoes[0]->endereco->rua ?? ''}},
                            {{auth()->user()->instituicoes[0]->endereco->numero ?? ''}}<br>
                            {{auth()->user()->instituicoes[0]->endereco->bairro ?? ''}},
                            {{auth()->user()->instituicoes[0]->endereco->cidade ?? ''}}<br>
                            {{auth()->user()->instituicoes[0]->endereco->estado ?? ''}} - 
                            {{auth()->user()->instituicoes[0]->endereco->cep ?? ''}}



                        </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Telefone</div>
                          <div class="col-lg-9 col-md-8">{{auth()->user()->instituicoes[0]->telefone ?? ''}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">E-mail</div>
                          <div class="col-lg-9 col-md-8">{{auth()->user()->instituicoes[0]->email ?? ''}}</div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Site</div>
                          <div class="col-lg-9 col-md-8">{{auth()->user()->instituicoes[0]->site ?? ''}}</div>
                        </div>
                    @endif
                    
  
                  </div>
  
                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    @if(auth()->user()->perfi_id ==3)
                      <livewire:admin.usuario.profile.edit>                    
                    @endif
                  </div>  
                
  
                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <livewire:admin.usuario.profile.change-password>
                    <!-- End Change Password Form -->
  
                  </div>
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
  
</div>
