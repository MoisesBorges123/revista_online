<div>
    @if(!empty($artigo->autores))
    <table class="table table-striped mt-5">
        <thead>            
            <th>Nome</th>
            <th>E-mail</th>
            <th>Autor Principal</th>
            <th></th>
        </thead>
        <tbody>
                @foreach($artigo->autores as $autor)
                <tr>                    
                    <td>{{$autor->name}}</td>
                    <td>{{$autor->email}}</td>
                    <td>{!!$autor->autor_correspondente == 1 ? '<span class="text-success">Sim</span>' : '<span class="text-danger">Não</span>' !!}</td>
                    <td>
                        <button class="btn btn-danger" wire:click='delete("{{$autor->id}}","{{$autor->name}}")'>
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>

                </tr>
             
                @endforeach
            </tbody>
            
        </table>
        @else
    
            <div class="alert">
                <div class="alert-default">
                    Nenhum autor adicionado.
                </div>
            </div>
      
        @endif
    
</div>
