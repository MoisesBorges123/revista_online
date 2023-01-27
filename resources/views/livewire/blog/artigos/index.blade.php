<div>        
    @foreach($artigos as $artigo)      
    
    <x-blog.artigos.card 
    :titulo="$artigo->titulo"
    :volume="$artigo->volume"
    :numero="$artigo->numero"
    :doi="$artigo->doi"
    :datapublicacao="$artigo->inicio_publicacao"
    :resumoportugues="$artigo->resumo_portugues"
    :resumoingles="$artigo->resumo_ingles"
    :resumoespanhol="$artigo->resumo_espanhol"
    :ano="$artigo->ano" 
    :icone="$revista->areas_conhecimentos"
    />    
        
     @endforeach
</div>
