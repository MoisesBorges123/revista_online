<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class PerfilCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public $permission = [
        '/dashboard'=>[1,2,3,4],        
        '/instituicao'=>[1,2,3],
        '/revista'=>[1,2,3],
        '/artigo'=>[1,2,3,4],
        '/artigo-e-revistas'=>[1,2,3,4],
        '/areas-do-conhecimento'=>[1,2],
        '/usuario'=>[1],
    ];
    public function handle(Request $request, Closure $next)
    {
        
        if($this->permissions($request->getRequestUri(),auth()->user()->perfi_id))
        {
            return $next($request);
        }else{
            return redirect(RouteServiceProvider::FORBIDEN);
        }

        
        
    }
    private function permissions($url,$perfil){
    
       if(!empty($this->permission[$url]))
       {
           if(in_array($perfil,$this->permission[$url])){
               return true;
           }
           return false;

       }else
       {
        return true;
       }

    }
}
