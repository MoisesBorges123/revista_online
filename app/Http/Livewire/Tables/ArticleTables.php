<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Artigo;

class ArticleTables extends DataTableComponent
{
    protected $model = Artigo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public function showSelected(){
        $id = $this->getSelected();
        if(count($id)==1){
            $this->emit('changePage','show',$id[0]);
        }else{
            $this->emit('toast','Para executar esta ação você não pode selecionar mais de um registro.','warning');
        }
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
            'exportSelected' => 'Exportar',
            'showSelected' =>   'Detalhes',
        ];
    }
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Título", "titulo")
                ->sortable(),
            Column::make("Revista", "revista_id")
                ->sortable(),
            Column::make("Ano", "ano")
                ->sortable(),
            Column::make("Volume", "volume")
                ->sortable(),
            Column::make("DOI", "doi")
                ->sortable(),            
            Column::make("Link", "link_externo")
                ->sortable(),            
            Column::make("Numero", "numero")
                ->sortable(),           
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
