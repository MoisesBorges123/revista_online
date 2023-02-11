<x-guest-layout>
    <section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
                <div class="card">                    
                    
                    <x-jet-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('register') }}">
                    <div class="card-body">
                        <div class="card-title text-center mb-2">
                            <img src="{{asset('assets/img/logo.png')}}" alt="Logomarca" class='card-img img-fluid' style='width:15rem'>
                        </div>
                        <div class="card-subtitle text-center mb-4">
                            <small class="card-subtitle">Insira seus dados para fazer o cadastro.</small>
                        </div>

                        
                            @csrf

                            <div class="form">
                                
                            </div>
                            <div class="form">
                                <div class='form-group'>
                                <x-jet-label class='form-label' for="name" value="{{ __('Name') }}" />
                                <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>
                            </div>
                            <div class="form">
                                <div class="form-group">
                                    <x-jet-label class='form-label' for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                                </div>
                            </div>
                            <div class="form">
                                <div class="form-group">
                                    <x-jet-label class='form-label' for="Perfil" value="{{ __('Perfil') }}" />
                                    <select name="perfil" id="perfil" class="form-control">
                                        <option value=""> - Selecione - </option>
                                        @forelse($perfis as $perfil)
                                        <option value="{{$perfil->id}}">{{$perfil->nome}}</option>
                                        @empty
                                        @endif
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form">                                
                                <div class="form-group">
                                    <x-jet-label  class='form-label' for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="form">
                                <div class="form-group">
                                    <x-jet-label  class='form-label' for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="form">
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="form-group">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms"/>

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif
                            </div>
                            
                            
                        </div>
                        <div class="card-footer" style='background-color:#fff; border-top:none'>
                            <div class="d-flex">
                                <button type='submit' class="btn-get-started">Registrar</button>
                                <a href="{{route('login')}}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Já sou registrado</span></a>
                            </div>
                        </div>
                    </form>
                
                </div>                          
          
        </div>
      </section>
    
</x-guest-layout>
