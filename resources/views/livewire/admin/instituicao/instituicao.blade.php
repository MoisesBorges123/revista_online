<div>
  <h1>Instituicao</h1>
    @if($window =='index')
        <livewire:admin.instituicao.index></livewire:admin.instituicao.index>
    @elseif($window == 'show')
    @elseif($window == 'delete')
    @elseif($window == 'create')
    @elseif($window == 'edit')
    @endif
</div>
