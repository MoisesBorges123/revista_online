<section class="section">
    <div class="row justify-content-center">
        <div class="col-md-8 com-sm-12">
            
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cadastrar Instituição</h5>

          <!-- Multi Columns Form -->
          <form wire:submit.prevent="store" class="row g-3">
            <div class="col-md-12">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" wire:model="nome" class="form-control @error('nome') is-invalid @enderror" id="nome">
              @error('nome') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="cnpj" class="form-label">CNPJ</label>
              <input type="text" wire:model="cnpj" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj">
              @error('cnpj') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
              <label for="site" class="form-label">Site</label>
              <input type="url" wire:model="site" class="form-control @error('site') is-invalid @enderror" id="site">
              @error('site') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
              <label for="mail"  class="form-label">Email</label>
              <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="mail">
              @error('email') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" wire:model='senha' class="form-control @error('senha') is-invalid @enderror" id="senha">
              @error('senha') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>      
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text"  wire:model='telefone' onfocus="telefone()" class="telefone form-control @error('telefone') is-invalid @enderror" id="telefone">
                        @error('telefone') <span class="text-danger error">{{ $message }}</span> @enderror
                      </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="cep" class="form-label">Cep</label>
                        <div class="input-group">
                            <input type="text" wire:model='cep' class="form-control @error('cep') is-invalid @enderror" id="cep">
                            <button type='button' wire:click='searchCep' class="btn btn-info text-white">
                                <span class="bi bi-search"></span>
                            </button>
                        </div>
                        @error('cep') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" wire:model='numero' class="form-control @error('numero') is-invalid @enderror" id="numero">
                        @error('numero') <span class="text-danger error">{{ $message }}</span> @enderror
                      </div>
                      
                </div>
            </div>      
            <div class="col-12">
              <label for="rua" class="form-label">Rua</label>
              <input type="text" wire:model='rua' class="form-control @error('rua') is-invalid @enderror" id="rua" >
              @error('rua') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
              <label for="bairro"  class="form-label">Bairro</label>
              <input type="text" wire:model="bairro" class="form-control @error('bairro') is-invalid @enderror" id="bairro" >
              @error('bairro') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
              <label for="cidade" class="form-label">Cidade</label>
              <input type="text" wire:model='cidade' class="form-control @error('cidade') is-invalid @enderror" id="cidade">
              @error('cidade') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-4">
              <label for="estado"  class="form-label">Estado</label>
              <select id="estado" wire:model='estado' class="form-select @error('estado') is-invalid @enderror">
                <option selected>Selecione...</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
              </select>
              @error('estado') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            
            <div class="text-center">
              <button type="submit" class="btn btn-large-1 btn-primary">Salvar</button>              
            </div>
          </form><!-- End Multi Columns Form -->

        </div>
      </div>

        </div>

    </div>
    
</section>
