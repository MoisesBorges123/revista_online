 <div class='row justfy-content-center'>
     
       <div class='col-8'>            
        <section class="section">
            <div class="card">                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <h5 class="card-title">Adicionar Autores</h5>
                        </div>                        
                    </div>
                    <livewire:admin.autores.create id='{{$artigo}}'>
                    <livewire:admin.autores.index  artigo_id='{{$artigo}}'></livewire:admin.autores.index>
                    <livewire:admin.autores.delete></livewire:admin.autores.delete>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button class="btn btn-success" wire:click="$emit('changePage','index')">
                                <span class="bi bi-check-circle"></span> Finalizar cadastro
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

