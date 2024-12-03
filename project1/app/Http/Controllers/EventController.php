<?php

namespace App\Http\Controllers;
use \App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('design.dashboard',compact('events'));
    }






    public function add_event(Request $request)
    {
        try{
            $request->validate([
                'event_name' => 'required|string|max:255',
                'event_description' => 'required|string|max:255'
            ]);

            Event::create([
                'event_name' => $request->event_name,
                'event_description' => $request->event_description,
            ]);

            return redirect()->route('admin.main-dashboard')->with('success','Event Successfully Added');
        } catch(\Exception $e){

            return redirect()->route('admin.main-dashboard')->with('error','Event exist!');
        }
            

    }


    public function update_event(Request $request, $id)
    {

        $event = Event::findOrFail($id);

       


        try{
            $request->validate([
                'event_name' => 'required|string|max:255',
                'event_description' => 'required|string|max:255'
            ]);

            $event->event_name = $request->event_name;
            $event->event_description = $request->event_description;
            $event->save();

            return redirect()->route('admin.main-dashboard')->with('success','Event Successfully Updated');
        } catch(\Exception $e){

            return redirect()->route('admin.main-dashboard')->with('error','Event name already exist!');
        }
            

    }


}
