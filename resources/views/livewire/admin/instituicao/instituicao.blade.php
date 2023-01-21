<div>
    <div class="pagetitle">
        <h1>Instituições</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Layouts</li>
          </ol>
        </nav>
      </div>
      <div class='row justfy-content-left'>
          @if($window == 'index')
          <div class="col-2 mb-5">
              <button class="btn btn-primary" wire:click="setWindow('create')">
                  <span class="bi bi-plus-circle"></span> Adicionar
              </button>
          </div>
          @elseif($window == 'create')
          <div class="col-2 mb-5">
              <button class="btn btn-secondary" wire:click="setWindow('index')">
                  <span class="bi bi-list"></span> Cadastrados
              </button>
          </div>
          @elseif($window == 'edit')
          <div class="col-2 mb-5">
            <button class="btn btn-danger" wire:click="setWindow('index')">
                <span class="bi bi-arrow-90deg-left"></span> Voltar
            </button>
        </div>
          @endif
      </div>
    @if($window =='index')
      
        <livewire:admin.instituicao.index></livewire:admin.instituicao.index>
        
    @elseif($window == 'show')
        <livewire:admin.instituicao.show></livewire:admin.instituicao.show>  
    @elseif($window == 'create')
        <livewire:admin.instituicao.create></livewire:admin.instituicao.create>
    @elseif($window == 'edit')
        <livewire:admin.instituicao.edit id="{{$selectedID}}"></livewire:admin.instituicao.edit>
    @endif
    <livewire:admin.instituicao.delete></livewire:admin.instituicao.delete>
</div>

@push('script')
<script>
   function telefone()
        {
           
            var phone=$('.telefone');
            let inp = new Inputmask('(99) 9 9999-9999',{
                onBeforeMask: function (value, opts) {
                    if(null === value){
                        value= '*'
                    }
                    return value;
                }
            });
            if(phone.val() != null){
                inp.mask(phone);
            }
        }
</script>
@endpush