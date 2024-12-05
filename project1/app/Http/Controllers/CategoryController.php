<?php

namespace App\Http\Controllers;
use \App\Models\Event;
use \App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::all();
        return view('design.category',compact('categories','events'));
    }
    public function add_category(Request $request)
    {
        try{
            $request->validate([
                'event_category' => 'required|string|max:255',
                'category_description' => 'required|string|max:255',
                'event_id' => 'required|exists:events,id'
            ]);

            Category::create([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
            ]);

            return redirect()->route('admin.main-dashboard')->with('success','Category Successfully Added');
        } catch(\Exception $e){

            return redirect()->route('admin.main-dashboard')->with('error','Category exist!');
        }
            

    }


    public function update_category(Request $request, $id)
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

    public function delete_event(Request $request, $id)
    {


        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.main-dashboard')->with('success', 'Delete Successfully');





    }

}
