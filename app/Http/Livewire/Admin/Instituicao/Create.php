<?php

namespace App\Http\Livewire\Admin\Instituicao;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Instituicao;
use App\Rules\CnpjValidation;
use App\Services\Admin\BasicService;
use Livewire\Component;
use Laravel\Jetstream\Contracts\CreatesTeams;

class Create extends Component 
{
    public $cnpj, $nome, $site, $rua, $email, $senha, $bairro, $estado, $cep, $cidade, $telefone, $logo, $numero;
    public function rules() 
    {
        return [
            'nome'=>['required','min:5'],
            'cnpj'=>['required','unique:instituicoes,cnpj', new CnpjValidation()],
            'site'=>['min:5','max:43'],
            'email'=>['required'],            
        ];
    }
    public function render()
    {
        return view('livewire.admin.instituicao.create');
    }
    public function store()
    {
        
        $this->validate();
        
        try{
            $password =str_replace('-','',str_replace('/','',str_replace('.','',$this->cnpj)));
            $user = new CreateNewUser();
            $newUser =$user->create([
                'name'=>$this->nome,
                'email'=>$this->email,
                'perfil'=>3,
                'change_password'=>true,
                'password'=>$password,
                'confirm_password'=>$password
            ]);
            
            $endereco = [
                'rua'=>$this->rua,
                'bairro'=>$this->bairro,
                'cidade'=>$this->cidade,
                'estado'=>$this->estado,
                'cep'=>$this->cep,
                'numero'=>$this->numero
            ];
            $newInstituicao = Instituicao::create([
                'cnpj'=>$this->cnpj,
                'nome_fantasia'=>$this->nome,
                'site'=>$this->site,
                'endereco_id'=>BasicService::saveEndereco($endereco) ?? null,
                'telefone'=>$this->telefone,
                'email'=>$this->email,
                'logo'=>$this->logo
                
            ]);
            $newUser->instituicoes()->attach($newInstituicao->id);
            
            $this->emit('toast','Instituição cadastrada com sucesso!','success');
            $this->reset();
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
