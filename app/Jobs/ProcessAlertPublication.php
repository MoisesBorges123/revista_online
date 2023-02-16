<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Revista;
use App\Models\Alert;
use App\Models\Artigo;
use App\Models\User;

class ProcessAlertPublication implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set("America/Sao_Paulo");
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::get();
        foreach($users as $user){

        
            unset($instituicoes);
            $instituicoes=[];
            if($user->perfi_id == 3){
                foreach($user->instituicoes as $instituicao)
                {
                    array_push($instituicoes,$instituicao->id);
                }
                $revistas = Revista::whereIn('instituicoe_id',$instituicoes)->get();
                foreach($revistas as $revista)
                {
                    switch ($revista->periodicidade)
                    {
                        case 'Diário':                            
                            $artigo = count(Artigo::where('revista_id',$revista->id)->where('inicio_publicacao',date('Y-m-d',time()))->get());                            
                            
                            if($artigo == 0){
                                if(empty(count(Alert::where('codigo','post'.$revista->id)->get()))){
                                    Alert::create([
                                        'user_id'=>$user->id,
                                        'mensagem'=>'Não se esqueça de fazer uma publicação na revista '.$revista->titulo ,
                                        'tipo'=>'info',
                                        'titulo'=>'Fazer publicação.',
                                        'codigo'=>'post'.$revista->id
                                    ]);
                                }
                            }else{
                                $alert = Alert::where('codigo','post'.$revista->id)->first();
                               
                                if(!empty($alert)){
                                    $alert->delete();
                                }
                            }
                            break;
                        case "Semanal": 
                            $artigo = count(Artigo::where('revista_id',$revista->id)->where('inicio_publicacao','>=',date('Y-m-d',strtotime('-7 days',time())))->where('inicio_publicacao','<=',date('Y-m-d',time()))->get() );
                            if($artigo == 0){
                                if(empty(count(Alert::where('codigo','post'.$revista->id)->get()))){
                                    Alert::create([
                                        'user_id'=>$user->id,
                                        'mensagem'=>'Não se esqueça de fazer uma publicação na revista '.$revista->titulo ,
                                        'tipo'=>'info',
                                        'titulo'=>'Fazer publicação.',
                                        'codigo'=>'post'.$revista->id
                                    ]);
                                }
                            }else{
                                $alert = Alert::where('codigo','post'.$revista->id)->first();
                                if(!empty($alert)>0){
                                    $alert->delete();
                                }
                            }
                            break;
                        case "Mensal": 
                            $artigo = count(Artigo::where('revista_id',$revista->id)->where('inicio_publicacao',date('Y-m-d',strtotime('-30 days',time())))->where('inicio_publicacao','<=',date('Y-m-d',time()))->get());
                            if($artigo == 0){
                                if(empty(count(Alert::where('codigo','post'.$revista->id)->get()))){
                                    Alert::create([
                                        'user_id'=>$user->id,
                                        'mensagem'=>'Não se esqueça de fazer uma publicação na revista '.$revista->titulo ,
                                        'tipo'=>'info',
                                        'titulo'=>'Fazer publicação.',
                                        'codigo'=>'post'.$revista->id
                                    ]);
                                }
                            }else{
                                $alert = Alert::where('codigo','post'.$revista->id)->first();
                                if(!empty($alert)>0){
                                    $alert->delete();
                                }
                            }
                            break;
                        case "Quinzenal": 
                            $artigo = count(Artigo::where('revista_id',$revista->id)->where('inicio_publicacao',date('Y-m-d',strtotime('-15 days',time())))->where('inicio_publicacao','<=',date('Y-m-d',time()))->get());
                            if($artigo == 0){
                                if(empty(count(Alert::where('codigo','post'.$revista->id)->get()))){
                                    Alert::create([
                                        'user_id'=>$user->id,
                                        'mensagem'=>'Não se esqueça de fazer uma publicação na revista '.$revista->titulo ,
                                        'tipo'=>'info',
                                        'titulo'=>'Fazer publicação.',
                                        'codigo'=>'post'.$revista->id
                                    ]);
                                }
                            }else{
                                $alert = Alert::where('codigo','post'.$revista->id)->first();
                                if(!empty($alert)>0){
                                    $alert->delete();
                                }
                            }
                            break;
                        case "Trienal": 
                            $artigo = count(Artigo::where('revista_id',$revista->id)->where('inicio_publicacao',date('Y-m-d',strtotime('-90 days',time())))->where('inicio_publicacao','<=',date('Y-m-d',time()))->get());
                            if($artigo == 0){
                                if(empty(count(Alert::where('codigo','post'.$revista->id)->get()))){
                                    Alert::create([
                                        'user_id'=>$user->id,
                                        'mensagem'=>'Não se esqueça de fazer uma publicação na revista '.$revista->titulo ,
                                        'tipo'=>'info',
                                        'titulo'=>'Fazer publicação.',
                                        'codigo'=>'post'.$revista->id
                                    ]);
                                }
                            }else{
                                $alert = Alert::where('codigo','post'.$revista->id)->first();
                                if(!empty($alert)>0){
                                    $alert->delete();
                                }
                            }
                            break;
                        case "Semestral": 
                            $artigo = count(Artigo::where('revista_id',$revista->id)->where('inicio_publicacao',date('Y-m-d',strtotime('-180 days',time())))->where('inicio_publicacao','<=',date('Y-m-d',time()))->get());
                            if($artigo == 0){
                                if(empty(count(Alert::where('codigo','post'.$revista->id)->get()))){
                                    Alert::create([
                                        'user_id'=>$user->id,
                                        'mensagem'=>'Não se esqueça de fazer uma publicação na revista '.$revista->titulo ,
                                        'tipo'=>'info',
                                        'titulo'=>'Fazer publicação.',
                                        'codigo'=>'post'.$revista->id
                                    ]);
                                }
                            }else{
                                $alert = Alert::where('codigo','post'.$revista->id)->first();
                                if(!empty($alert)>0){
                                    $alert->delete();
                                }
                            }
                            break;
                        case "Anual": 
                            $artigo = count(Artigo::where('revista_id',$revista->id)->where('inicio_publicacao',date('Y-m-d',strtotime('-365 days',time())))->where('inicio_publicacao','<=',date('Y-m-d',time()))->get());
                            if($artigo == 0){
                                if(empty(count(Alert::where('codigo','post'.$revista->id)->get()))){
                                    Alert::create([
                                        'user_id'=>$user->id,
                                        'mensagem'=>'Não se esqueça de fazer uma publicação na revista '.$revista->titulo ,
                                        'tipo'=>'info',
                                        'titulo'=>'Fazer publicação.',
                                        'codigo'=>'post'.$revista->id
                                    ]);
                                }
                            }else{
                                $alert = Alert::where('codigo','post'.$revista->id)->first();
                                if(!empty($alert)>0){
                                    $alert->delete();
                                }
                            }
                            break;
                        default:
                            break;

                    }
                }
            }

        }
    }
}
