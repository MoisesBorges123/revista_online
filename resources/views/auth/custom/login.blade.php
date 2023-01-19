<x-guest-layout>
    <section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
                <div class="card">                    
                    
                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        <div class="card-body">
                            <div class="card-title text-center mb-2">
                                <img src="{{asset('assets/img/logo.png')}}" alt="Logomarca" class='card-img img-fluid' style='width:15rem'>
                            </div>
                            <div class="card-subtitle text-center mb-4">
                                <small class="card-subtitle">Insira seu email e senha para fazer o login</small>
                            </div>

                            
                                @csrf

                                <div class="form">
                                    
                                </div>
                                <div class="form">
                                    <div class='form-group'>
                                    <x-jet-label class='form-label' for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                                </div>
                                <div class="form">
                                    <div class="form-group">
                                        <x-jet-label class='form-label' for="password" value="{{ __('Senha') }}" />
                                        <x-jet-input id="password" class="form-control" type="password" name="password" :value="old('password')" required />
                                    </div>
                                </div>
                           
                            
                            
                            
                            
                        </div>
                        <div class="card-footer" style='background-color:#fff; border-top:none'>
                            <div class="d-flex">
                                <button type='submit' class="btn-get-started">Entrar</button>
                                <a href="{{route('login')}}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Primeiro acesso</span></a>
                            </div>
                        </div>
                    </form>
                
                </div>                          
          
        </div>
      </section>
    
</x-guest-layout>
