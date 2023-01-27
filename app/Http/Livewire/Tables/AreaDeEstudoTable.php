<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AreaEstudo;

class AreaDeEstudoTable extends DataTableComponent
{
    protected $model = AreaEstudo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');        
        $this->setEmptyMessage('Nenhum registro encontrado.');
        $this->setSearchStatus(true);
        $this->setColumnSelectStatus(false);
    }
    public function editSelected()
    {
        $id = $this->getSelected();
        if(count($id)==1){
            $this->emit('changePage','edit',$id[0]);
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
    public function bulkActions(): array
    {
        return [
            'editSelected' =>   'Alterar',
            'deleteSelected' => 'Apagar',            
        ];
    }
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nome", "nome")
                ->sortable()
                ->searchable(),
            Column::make("Icone", "icone")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
