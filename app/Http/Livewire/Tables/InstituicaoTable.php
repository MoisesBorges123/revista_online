<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Instituicao;
use Illuminate\Database\Eloquent\Builder;

class InstituicaoTable extends DataTableComponent
{
    protected $model = Instituicao::class;
    public string $tableName = 'instituicoes';
    public array $instituicoes = [];
    public function configure(): void
    {
        
        $this->setPrimaryKey('id');
        $this->setEmptyMessage('Nenhum registro encontrado.');
        $this->setSearchStatus(true);
        $this->setColumnSelectStatus(false);
        
        

    }
    public $columnSearch = [
        'nome' => null,
        'cnpj' => null,
    ];
    public function bulkActions(): array
    {
        return [
            'exportSelected' => 'Exportar',
            'deleteSelected' => 'Apagar',
            'editSelected' => 'Alterar',
            'showSelected' => 'Detalhes',
        ];
    }
    public function showSelected(){
        $id = $this->getSelected();
        if(count($id)==1){
            $this->emit('changeInstituicaoPage','show',$id[0]);
        }else{
            $this->emit('toast','Para executar esta ação você não pode selecionar mais de um registro.','warning');
        }
    }
    public function editSelected()
    {
        $id = $this->getSelected();
        if(count($id)==1){
            $this->emit('changeInstituicaoPage','edit',$id[0]);
        }else{
            $this->emit('toast','Para executar esta ação você não pode selecionar mais de um registro.','warning');
        }
    }
    public function deleteSelected(){
        $id = $this->getSelected();
        if(count($id) >= 1)
        {
            $esteregistro = count($id) == 1 ? 'este registro' : 'estes registros';
            $this->emit('swal',"Tem certeza que deseja apagar $esteregistro ?",'delete',$id);
        }else
        {
            $this->emit('toast','Você precisa selecionar pelo menos um registro para executar essa ação.','warning');
        }
        
    }
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nome", "nome_fantasia")
                ->sortable()
                ->searchable(),
            Column::make("Cnpj", "cnpj")
                ->sortable()
                ->searchable(),
            Column::make("Site", "site")
                ->sortable(),                            
            Column::make("Telefone", "telefone")
                ->sortable(),
            Column::make("E-mail", "email")
                ->sortable()
                ->searchable(),
          
        ];
    }
    public function query(): Builder
    {
        return Instituicao::query()
            ->when($this->columnSearch['nome'] ?? null, fn ($query, $nome) => $query->where('instituicoes.nome', 'like', '%' . $nome . '%'))
            ->when($this->columnSearch['cnpj'] ?? null, fn ($query, $cnpj) => $query->where('instituicoes.cnpj', 'like', '%' . $cnpj . '%'));
    }
}
