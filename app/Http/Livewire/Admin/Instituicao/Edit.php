<?php

namespace App\Http\Livewire\Admin\Instituicao;

use Livewire\Component;
use App\Models\Instituicao;
use App\Rules\CnpjValidation;
use App\Services\Admin\BasicService;

class Edit extends Component
{
    public $instituicao;
    public $cnpj, $nome, $site, $rua, $email, $senha, $bairro, $estado, $cep, $cidade, $telefone, $logo, $numero;
    public function rules() 
    {
        return [
            'nome'=>['required','min:5'],
            'cnpj'=>['required', new CnpjValidation()],
            'site'=>['min:5'],
            'email'=>['required'],
            'cep' =>['required'],
            'rua' =>['required'],
            'estado' =>['required'],
            'numero' =>['required'],
            'cidade' =>['required'],
        ];
    }
    public function mount($id)
    {
        $this->instituicao = Instituicao::find($id);
        
        $this->nome= $this->instituicao->nome_fantasia;
        $this->site= $this->instituicao->site;
        $this->cnpj = $this->instituicao->cnpj;
        $this->email = $this->instituicao->email;
        $this->telefone = $this->instituicao->telefone;
        $this->logo = $this->instituicao->logo;
        $this->rua = $this->instituicao->endereco->rua;
        $this->estado = $this->instituicao->endereco->estado;
        $this->cidade = $this->instituicao->endereco->cidade;
        $this->bairro =$this->instituicao->endereco->bairro;
        $this->cep = $this->instituicao->endereco->cep;
        $this->numero  = $this->instituicao->endereco->numero;

    }
    public function render()
    {
        return view('livewire.admin.instituicao.edit');
    }
    public function update()
    {
        
        
        $this->validate();
        try{
            $endereco = [
                'rua'=>$this->rua,
                'bairro'=>$this->bairro,
                'cidade'=>$this->cidade,
                'estado'=>$this->estado,
                'cep'=>$this->cep,
                'numero'=>$this->numero
            ];
            BasicService::updateEndereco($endereco,$this->instituicao->endereco_id);
            $this->instituicao->update([
                'cnpj'=>$this->cnpj,
                'nome_fantasia'=>$this->nome,
                'site'=>$this->site,
                'telefone'=>$this->telefone,
                'email'=>$this->email,
                'logo'=>$this->logo
                
            ]);
            $this->emit('toast','Instituição atualizado com sucesso!','success');
            $this->reset();
            $this->emit('changeInstituicaoPage','index');
            $this->emit('refreshDatatable');
        }catch(\Exception $e){
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
    public function searchCep(){
        if(mb_strlen($this->cep)>5){
            try{
                $dados = BasicService::searchCEp($this->cep);                
                
                $this->rua = $dados['logradouro'] ?? $dados['rua'] ?? '';
                $this->bairro = $dados['bairro'] ?? '';
                $this->estado = $dados['uf'] ?? $dados['estado'] ?? '';                
                $this->cidade = $dados['localidade'] ??  $dados['cidade'] ?? '';                
                
            }catch(\Exception $e){
                $this->emit('toast','Ocorreu um erro ao fazer a busca.','warning');
                $this->reset();
                $this->emit('changeInstituicaoPage','index');
            }
        }else{
            $this->emit('toast','O cep digitado não é valido.','warning');
        }
    }
}
