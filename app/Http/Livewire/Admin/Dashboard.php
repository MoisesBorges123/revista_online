<?php

namespace App\Http\Livewire\Admin;
use App\Models\Revista;
use Livewire\Component;

class Dashboard extends Component
{
    public $instituicao=[],$numPublicRevista, $numPublicArtigo;
    public function mount()
    {   
        foreach(auth()->user()->instituicoes as $instituicao)
        {
            array_push($this->instituicoes,$instituicao->id);
        }
        $this->countRevista('semestre');
        $this->countArtigo('semestre');
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
    }
    
}
