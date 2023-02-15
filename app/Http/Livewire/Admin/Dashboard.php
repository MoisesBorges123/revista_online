<?php

namespace App\Http\Livewire\Admin;
use App\Models\Revista;
use Livewire\Component;

class Dashboard extends Component
{
    public $instituicoes=[],$numPublicRevista, $numPublicArtigo, $numPublicAutores,$headerCard1,$headerCard2,$headerCard3;
    public function mount()
    {   
        foreach(auth()->user()->instituicoes as $instituicao)
        {
            array_push($this->instituicoes,$instituicao->id);
        }
        $this->countRevista('semestre');
        $this->countArtigo('semestre');
        $this->countAutores('semestre');
    }
    public function render()
    {
        
        return view('livewire.admin.dashboard')->layout('layouts.app');
    }
    protected function searchDataInicioFim($filtro)
    {
        
            if($filtro == 'semestre')
            {
                
                $data_inicio = date('Y-m-d',strtotime('-180 days',time()));
                $data_fim = date('Y-m-d',time());                

            }elseif($filtro == 'mes')
            {
                $data_inicio = date('Y-m-d',strtotime('-30 days',time()));
                $data_fim = date('Y-m-d',time()); 
            }elseif($filtro == 'trimestre')
            {
                $data_inicio = date('Y-m-d',strtotime('-90 days',time()));
                $data_fim = date('Y-m-d',time()); 
            }
            
            return array('data_inicio'=>$data_inicio,'data_fim'=>$data_fim);
    }
    
    public function countRevista($filtro)
    {
        
       $datas = $this->searchDataInicioFim($filtro);
        if(auth()->user()->perfi_id == 3)
        { 
     
            
            $this->numPublicRevista =  count(Revista::where('inicio_publicacao','>=',$datas['data_inicio'])
                    ->whereIn('instituicoe_id',$this->instituicoes)
                    ->where('inicio_publicacao','<=',$datas['data_fim'])
                    ->get());        
            
        }else
        {
        $this->numPublicRevista = count( Revista::where('inicio_publicacao','>=',$datas['data_inicio'])
            ->where('inicio_publicacao','<=',$datas['data_fim'])
            ->get());
         
        }
        switch ($filtro){
            case 'semestre':
                $this->headerCard1 = '06 meses atrás';
                break;
            case 'trimestre':                
                $this->headerCard1 = '03 meses atrás';
                break;
            case 'mes':
                $this->headerCard1 = '30 dias atrás';
                break;

        }
        
    }
    public function countArtigo($filtro)
    {
        $datas = $this->searchDataInicioFim($filtro);
        
        if(auth()->user()->perfi_id == 3)
        { 
            
            $revistas = Revista::where('inicio_publicacao','>=',$datas['data_inicio'])
                    ->where('inicio_publicacao','<=',$datas['data_fim'])
                    ->whereIn('instituicoe_id',$this->instituicoes)
                    ->get();        
            $artigos=0;
            foreach($revistas as  $revista)
            {
                
                $artigos+=count($revista->artigos);
            }
            $this->numPublicArtigo =  $artigos;
        }else
        {
            $revistas =  Revista::where('inicio_publicacao','>=',$datas['data_inicio'])
            ->where('inicio_publicacao','<=',$datas['data_fim'])
            ->get();
            $artigos=0;
            foreach($revistas as  $revista)
            {
                $artigos+=count($revista->artigos);
            }
            $this->numPublicArtigo =  $artigos;

        }
        switch ($filtro){
            case 'semestre':
                $this->headerCard2 = '06 meses atrás';
                break;
            case 'trimestre':
                $this->headerCard2 = '03 meses atrás';
                break;
            case 'mes':
                $this->headerCard2 = '30 dias atrás';
                break;

        }
    }
    public function countAutores($filtro)
    {
        $datas = $this->searchDataInicioFim($filtro);
        
        if(auth()->user()->perfi_id == 3)
        { 
            
            $revistas = Revista::where('inicio_publicacao','>=',$datas['data_inicio'])
                    ->where('inicio_publicacao','<=',$datas['data_fim'])
                    ->whereIn('instituicoe_id',$this->instituicoes)
                    ->get();        
            $autores=0;
            foreach($revistas as  $revista)
            {
                
                foreach($revista->artigos as $artigo)
                {
                    $autores+= count($artigo->autores);
                }
            }
            $this->numPublicAutores =  $autores;
        }else
        {
            $revistas =  Revista::where('inicio_publicacao','>=',$datas['data_inicio'])
            ->where('inicio_publicacao','<=',$datas['data_fim'])
            ->get();
            $autores=0;
            foreach($revistas as  $revista)
            {
                foreach($revista->artigos as $artigo)
                {
                    $autores+= count($artigo->autores);
                }
                
            }
            $this->numPublicAutores =  $autores;

        }
        switch ($filtro){
            case 'semestre':
                $this->headerCard3 = '06 meses atrás';
                break;
            case 'trimestre':
                $this->headerCard3 = '03 meses atrás';
                break;
            case 'mes':
                $this->headerCard3 = '30 dias atrás';
                break;

        }
    }
    
}
