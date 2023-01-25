<div>
    <div class="pagetitle">
        <h1>Artigo</h1>
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
      
        <livewire:admin.artigo.index></livewire:admin.artigo.index>
        
    @elseif($window == 'show')
        <livewire:admin.artigo.show></livewire:admin.artigo.show>  
    @elseif($window == 'create')
        <livewire:admin.artigo.create></livewire:admin.artigo.create>
    @elseif($window == 'edit')
        <livewire:admin.artigo.edit id="{{$selectedID}}"></livewire:admin.artigo.edit>
    @endif
    <livewire:admin.artigo.delete></livewire:admin.artigo.delete>
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