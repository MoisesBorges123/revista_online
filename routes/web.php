<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{ 
    Home\Home,
    Admin\Dashboard,
    Admin\Instituicao\Instituicao,
    Admin\Revista\Revista,
    Admin\Artigo\Artigo,
    Admin\Configuracoes\AreaEstudo\AreaEstudo,
    Blog\Revistas\Index as RevistaBlog,
    Blog\Artigos\Artigo AS ArtigoBlog
};


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
Route::get('/revistas', RevistaBlog::class)->name('revistas');
Route::get('/artigos/{id?}', ArtigoBlog::class)->name('artigos');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/instituicao', Instituicao::class)->name('instituicao');
    Route::get('/revista', Revista::class)->name('revista');
    Route::get('/artigo', Artigo::class)->name('artigo');
    Route::get('/artigo-e-revistas', Artigo::class)->name('artigo');
    Route::get('/areas-do-conhecimento', AreaEstudo::class)->name('areaestudo');
});
