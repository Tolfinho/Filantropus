<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\User;

class EventController extends Controller
{
    
    public function index(){
        $events = Event::all();

        return view('home', ['events' => $events]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
       
        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->local = $request->local;
        $event->minVoluntarios = $request->minVoluntarios;
        $event->requisitos = $request->requisitos;
        $event->status = 1;

        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('images/events'), $imageName);

            $event->image = $imageName;

        }

        //Salva ID do usuário que está criando o evento no evento
        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with("msg", "Evento criado com sucesso!");
    }

    public function show($id){

        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userEvents = $user->eventAsParticipant->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', '=', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);

    }

    public function dashboard(){
        $user = auth()->user();

        $events = $user->events;

        $eventAsParticipant = $user->eventAsParticipant;

        return view('dashboard', ['events' => $events, 'user' => $user, 'eventAsParticipant' => $eventAsParticipant]);
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $users = $event->users;
        echo $users."\n\n\n".count($users);

        for($i=0;$i<count($users);$i++){
            $users[$i]->eventAsParticipant()->detach($event->id);
        }
        
        $event = Event::findOrFail($id)->delete();

        return redirect('/dashboard');
    }

    public function edit($id){
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request){
        
        $data = $request->all();

            //Image Upload
            if($request->hasFile('image') && $request->file('image')->isValid()){

                $requestImage = $request->image;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

                $requestImage->move(public_path('images/events'), $imageName);

                $data['image'] = $imageName;

            }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento alterado com sucesso!');

    }

    public function joinEvent($id){
        $user = auth()->user();

        $user->eventAsParticipant()->attach($id);

        return redirect('/dashboard');
    }

    public function leaveEvent($id){
        $user = auth()->user();

        $user->eventAsParticipant()->detach($id);

        return redirect('/dashboard');
    }

    public function toogleStatus($id){
        $event = Event::findOrFail($id);

        if($event->status == 0)
            $event->status = 1;
        elseif($event->status == 1)
            $event->status = 0;
            
        $event->save();

        return redirect('/dashboard');
    }

    public function participants($id){
        $event = Event::findOrFail($id);
        $participants = $event->users;

        return view('events.participants', ['event'=>$event, 'participants'=>$participants]);
    }

    public function removeParticipant($id, $idEvent){
        $user = User::findOrFail($id);
        //echo $id."<br><br>".$idEvent;

        $user->eventAsParticipant()->detach($idEvent);

        return redirect('/dashboard');
    }

}
