<?php
namespace App\Services\Admin;

use Livewire\Component;
use Livewire\Livewire;
use App\Models\Endereco;
class BasicService extends Component{

    public static function saveEndereco($dados){
        extract($dados);
        try{
            $endereco  = Endereco::create([
                'rua'=>$rua ?? '',
                'bairro'=>$bairro ?? '',
                'numero'=>$numero ?? '',
                'cidade'=>$cidade ?? '',
                'estado'=>$estado ?? '',  
                'cep'=>$cep ??''              
            ]);
            return $endereco->id;
        }
        catch(\Exception $e){
            return false;
            
        }

    }
    public static function updateEndereco($dados,$id){
        extract($dados);
        try{
            $endereco = Endereco::find($id);
            $endereco->update([
                'rua'=>$rua ?? '',
                'bairro'=>$bairro ?? '',
                'numero'=>$numero ?? '',
                'cidade'=>$cidade ?? '',
                'estado'=>$estado ?? '',  
                'cep'=>$cep ??''              
            ]);
            return $endereco->id;
        }
        catch(\Exception $e){
            return false;
            
        }

    }
    public static function searchCEp($cep){
        
        try{
            
            $dados = Endereco::where('cep',$cep)->first();
            if(!empty($dados)) 
            {
                return $dados->toArray();
            }else
            {
                $cep = preg_replace("/[^0-9]/", "", $cep);
                //$cep= substr($cep, 0,5).'-'.substr($cep, 5,3);
                $url = "http://viacep.com.br/ws/$cep/xml/";
                $xml = simplexml_load_file($url);         
                $array = json_decode(json_encode((array) $xml), 1);     
                if(!empty($array['error'])){
                    return false;
                }else{
                    return $array;          
                
                }
            }
            
            
            
        }catch(\Exception $e){

        }
        
        
    }
}
