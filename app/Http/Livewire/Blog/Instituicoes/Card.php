<?php

namespace App\Http\Livewire\Blog\Instituicoes;

use Livewire\Component;

class Card extends Component
{
    public $telefone, $cod, $numpublicacao, $publicacoes, $email, $enderecomodel, $endereco, $contato, $logo, $nome, $site;
    public function mount()
    {
        if($this->numpublicacao>0){
            $this->publicacoes = "<p>".str_pad($this->numpublicacao,3,'0',STR_PAD_LEFT)." revistas publicadas.</p>";
        }else
        {
            $this->publicacoes='';
        }
        if(!empty($this->telefone) && !empty($this->email))
        {
            $this->contato = $this->telefone. ' / '.$this->email;

        }else
        {
            if(!empty($this->telefone)){
                $this->contato = $this->telefone;
            }
            if(!empty($this->email)){
                $this->contato = $this->email;
            }
        }
        $this->endereco = $this->enderecomodel->rua.', nº'.$this->enderecomodel->numero.', CEP: '.$this->enderecomodel->cep.', '.$this->enderecomodel->cidade.' / '.$this->enderecomodel->estado;        
    }
    public function render()
    {
        return view('livewire.blog.instituicoes.card');
    }
}
