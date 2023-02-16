<?php

namespace App\Http\Livewire\Tables;

use App\Models\Instituicao;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables;
use App\Models\Revista;
use Illuminate\Database\Eloquent\Builder;

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
    public function builder(): Builder
    {
        
        if(auth()->user()->perfi_id == 3){    
            $instituicoes = [];
            foreach(auth()->user()->instituicoes as $instituicao)
            {
                array_push($instituicoes,$instituicao->id);
            }
           
            return Revista::query()        
                ->whereIn('instituicoe_id',$instituicoes);
        }
        else{
            return Revista::query();
        }
    }
    
    public function bulkActions(): array
    {
        return [
            
            'editSelected' => 'Alterar',
            'deleteSelected' => 'Apagar',
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
            Column::make("Instituição", "instituicao.nome_fantasia")
                ->sortable(),
            Column::make("Título", "titulo")
                ->sortable()->searchable(),
            Column::make("Subtitulo", "subtitulo")
                ->sortable()->searchable(),
            Column::make("ISSN", "issn")
                ->sortable()->searchable(),
            Column::make("Publicado em", "inicio_publicacao")
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
