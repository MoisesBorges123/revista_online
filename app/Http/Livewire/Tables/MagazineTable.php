<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Revista;

class MagazineTable extends DataTableComponent
{
    protected $model = Revista::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPrimaryKey('id');
        $this->setEmptyMessage('Nenhum registro encontrado.');
        $this->setSearchStatus(true);
        $this->setColumnSelectStatus(false);
    }
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
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->searchable(),
            Column::make("Instituicao id", "instituicao.nome_fantasia")
                ->sortable(),
            Column::make("Titulo", "titulo")
                ->sortable()->searchable(),
            Column::make("Subtitulo", "subtitulo")
                ->sortable()->searchable(),
            Column::make("ISSN", "issn")
                ->sortable()->searchable(),
            Column::make("Inicio publicacao", "inicio_publicacao")
                ->sortable()
                ->format(
                    fn($value,$row, Column $column)=> date('d/m/Y',strtotime($value))
                )
                ->searchable(),            
            Column::make("Editor responsável", "editor_responsavel")
                ->sortable()->searchable(),            
            Column::make("Visível", "visivel")
                ->format(
                    fn($value,$row, Column $column)=> (date('Y-m-d',strtotime($row->inicio_publicacao)) > (date('Y-m-d',time()))) || (date('Y-m-d',strtotime($row->inicio_publicacao)) <= (date('Y-m-d',time())) && ($value!=1)) ? '<span class="text-secondary bi bi-circle-fill"></span> Off' : '<span class="text-success bi bi-circle-fill"></span> On' 
                )
                ->html()
                ->sortable(),
          
        ];
    }
}
