<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if ($search) {
            $events = Event::where([
                ["title","like","%".$search."%"]
            ])->get();
        }else{
            $events = Event::all();

        }

        return view('index',[
            'events'=>$events,
            'search'=>$search
        ]);
    }

    public function allEvents()
    {
        $search = request('search');

        if ($search) {
            $events = Event::where([
                ["title","like","%".$search."%"]
            ])->get();
        }else{
            $events = Event::all();

        }

        return view('events.events',[
            'events'=>$events,
            'search'=>$search
        ]);
    }

    public function create(){
        return view('events.create');
    }

    public function events(){
        return view('events.events');
    }

    public function store(Request $request){

        $event = new Event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->participants = 0;
        $event->itens = $request->items;
        

        //Image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extesion = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") ). "." . $extesion;

            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();
        
        return redirect('/')->with('msg',"Evento criado com sucesso!");

    }



    public function show($id)
    {
    
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id',$event->user_id)->first()->toArray();

        $user = auth()->user();
        $hasUserJoined = false;
        if ($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {
                if ($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        return view('events.show',[
            'event'=>$event,
            'eventOwner'=>$eventOwner,
            'hasUserJoined'=>$hasUserJoined
        ]);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $events = $user->event;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('dashboard',[
            'events'=>$events,
            'eventsAsParticipant'=>$eventsAsParticipant
        ]);
    }

    public function destroy($id)
    {

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg',"Evento removido com sucesso!");
    

    }

    public function edit($id)
    {

        $user = auth()->user();

        $event = Event::findOrFail($id);

        if ($user->id == $event->user->id) {
            return view('events.edit',['event'=>$event]); 
        }else{
            return redirect('/dashboard');      
        }

    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;

        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');

    }

    public function joinEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/')->with('msg', 'Sua presença foi confirmada no evento ' . $event->title);

    }

    public function leaveEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/')->with('msg', 'Sua presença foi removida do evento ' . $event->title);

    }

}
