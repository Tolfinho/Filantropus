<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EventController;
use App\Models\Event;

/* Home */
Route::get('/', [EventController::class, 'index']);

/* Publicar Eventos */
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

/* Single Event */
Route::get('/events/{id}', [EventController::class, 'show']);

/* Salvar eventos */
Route::post('/events', [EventController::class, 'store']);

/* Deletar eventos */
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');

/* Editar eventos */
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

/* Ativar Eventos */
Route::post('/events/toogleStatus/{id}', [EventController::class, 'toogleStatus'])->middleware('auth');

/* Participar do Evento - Sair do Evento */
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');

/* Todos os Eventos */
Route::get('/all', function(){
    $events = Event::all();

    return view('all', ['events' => $events]);
});

/* Visualizar Participantes do seu Evento e Removê-los */
Route::get('/events/participants/{id}', [EventController::class, 'participants'])->middleware('auth');
Route::delete('/events/participants/{id}/{idEvent}', [EventController::class, 'removeParticipant'])->middleware('auth');

/* Dashboard do Usuário */
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

/* Autor do Site */
Route::get('/author', function(){
    return view('author');
});
