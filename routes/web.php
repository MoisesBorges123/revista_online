<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{ 
    Home\Home,
    Admin\Dashboard,
    Admin\Instituicao\Instituicao,
    Admin\Revista\Revista,
    Admin\Artigo\Artigo,
    Admin\Usuario\Usuario,
    Admin\Usuario\Profile\Profile,
    Admin\Configuracoes\AreaEstudo\AreaEstudo,   
    Blog\Revistas\Index as RevistaBlog,
    Blog\Artigos\Artigo AS ArtigoBlog,
    Blog\Instituicoes\Instituicao as InstituicaoBlog

};
use App\Http\Livewire\Admin\Mural\Mural as MuralMural;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/revistas/{id?}', RevistaBlog::class)->name('revistas');
Route::get('/instituções', InstituicaoBlog::class)->name('instituicoes');
Route::get('/artigos/{id?}', ArtigoBlog::class)->name('artigos');
Route::get('/403', function(){
    return 'Você não tem permissão para acessar essa rota';
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'permission'
])->group(function () {    
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/instituicao', Instituicao::class)->name('instituicao');
    Route::get('/revista', Revista::class)->name('revista');
    Route::get('/artigo', Artigo::class)->name('artigo');
    Route::get('/artigo-e-revistas', Artigo::class)->name('artigo');
    Route::get('/areas-do-conhecimento', AreaEstudo::class)->name('areaestudo');    
    Route::get('/usuario', Usuario::class)->name('usuario');
    Route::get('/meu-usario', Profile::class)->name('usuario.profile');
});

require_once __DIR__ .'/fortify.php';
require_once __DIR__ .'/jetstream.php';