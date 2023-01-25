<?php

namespace App\Http\Livewire\Admin\Artigo;
use App\Models\Artigo;
use App\Models\Autores;
use App\Models\Revista;
use Livewire\Component;

class Edit extends Component
{
    public $titulo, $revista_id,$ano,$volume,$doi,$arquivo,$link_externo,
    $palavra_chave,$numero,$resumo_portugues,$resumo_espanhol,$resumo_ingles;    
    public $autor,$artigo,$revista, $autor_correspondente, $email_autor_correspondente, $inicio_publicacao;
    public $updateAutor, $novo , $lastAutor=[];
    protected $rules = [
                        'titulo'=>'required|min:5',
                        'revista_id'=>'required',
                        'ano'=>'required',
                        'volume'=>'required',
                        'doi'=>'required',                        
                        'link_externo'=>'required',
                        'palavra_chave'=>'required',
                        'numero'=>'required',
                        'resumo_portugues'=>'required|min:10',
                        'resumo_espanhol'=>'required|min:10',
                        'resumo_ingles'=>'required|min:10',
                        'inicio_publicacao'=>'required'
                    ];
    public function mount($id)
    {
        $this->novo='';
        $this->revista=Revista::get();
        $this->artigo = Artigo::find($id);
        $this->titulo = $this->artigo->titulo;
        $this->revista_id = $this->artigo->revista_id;
        $this->ano = $this->artigo->ano;
        $this->volume = $this->artigo->volume;
        $this->doi  = $this->artigo->doi;
        $this->link_externo = $this->artigo->link_externo;
        $this->palavra_chave = $this->artigo->palavra_chave;
        $this->numero = $this->artigo->numero;
        $this->resumo_portugues = $this->artigo->resumo_portugues;
        $this->resumo_espanhol = $this->artigo->resumo_espanhol;
        $this->resumo_ingles = $this->artigo->resumo_ingles;
        $this->inicio_publicacao = $this->artigo->inicio_publicacao;
        /**Verifica quantos autores correspondentes estão relacionados a
         * este artigo e carrega na tela o ultimo cadastrado
        */
        $indice = count($this->artigo->autores)-1;
        $registro = null;
        do {
            if($indice >= 0 ){
                $registro = Autores::where('id',$this->artigo->autores[$indice]->id)->where('autor_correspondete',1)->get();
                $indice--;
            }
            
           
        } while ( empty($registro[0]) && $indice >= 0);
        $indice++;
        //dd($registro);
        if($indice > 0 ){
            $this->autor_correspondente = $this->artigo->autores[$indice]->name;
            $this->email_autor_correspondente = $this->artigo->autores[$indice]->email;
            $this->autor = Autores::find($this->artigo->autores[$indice]->id);
            $this->updateAutor = true;
            $this->lastAutor['nome'] = $this->autor_correspondente;
            $this->lastAutor['email']= $this->email_autor_correspondente;

        }else{
            $this->updateAutor = false;
            $this->novo = 'Novo';
        }
    }
    public function render()
    {
        return view('livewire.admin.artigo.edit');
    }
    public function updatedUpdateAutor()
    {
        
        if(!$this->updateAutor)
        {
            $this->novo = 'Novo';            
            $this->email_autor_correspondente ='';
            $this->autor_correspondente = '';
        }else
        {
            $this->novo = '';
            $this->autor_correspondente = $this->lastAutor['nome'] ;
            $this->email_autor_correspondente = $this->lastAutor['email'];
        }
    }
    public function update()
    {
        try
        {
            $this->validate();
            $this->artigo->update([
                'titulo'=>$this->titulo,
                'revista_id'=>$this->revista_id,                
                'ano'=>$this->ano,
                'volume'=>$this->volume,
                'doi'=>$this->doi,
                'arquivo'=>$this->arquivo,
                'link_externo'=>$this->link_externo,
                'palavra_chave'=>$this->palavra_chave,
                'numero'=>$this->numero,
                'resumo_portugues'=>$this->resumo_portugues,
                'resumo_espanhol'=>$this->resumo_espanhol,
                'resumo_ingles'=>$this->resumo_ingles,
                'inicio_publicacao'=>$this->inicio_publicacao
            ]);
            if(($this->autor_correspondente != $this->artigo->autores[0]->name) && !$this->updateAutor){
                //dd('Entrou');
                $autor = Autores::create([
                    'name'=>$this->autor_correspondente,
                    'autor_correspondete'=>true,
                    'email'=>$this->email_autor_correspondente,                
                ]);
                $autor->articles()->attach($this->artigo->id);
            }else{
                $this->autor->update([
                    'name'=>$this->autor_correspondente,
                    'autor_correspondete'=>true,
                    'email'=>$this->email_autor_correspondente
                ]);
            }
            $this->emit('toast','Artigo cadastrado com sucesso!','success');
            $this->emit('changePage','index');       
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
}
