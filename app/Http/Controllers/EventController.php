<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;
use RealRashid\SweetAlert\Facades\Alert;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = event::all();

        return view('event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required|file',
            'event_type' => 'required',
            'priority' => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT'] . '/Storage/event/';
        $imge->move($storeLocation, $storeFileN);

        $dbsl = '/Storage/event/' . $storeFileN;




        $evetn = new event();

        $evetn->title = $request->title;
        $evetn->img = $dbsl;
        $evetn->description = $request->description;
        $evetn->event_type = $request->event_type;
        $evetn->priority = $request->priority;
        $evetn->status = $request->status;

        $evetn->save();
        Alert::success('Success', 'event created successfully');
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        $this->validate($request, [
            'title' => 'required',
            'file' => 'nullable|file',
            'event_type' => 'required',
            'priority' => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $dbsl = $event->img;

        if ($request->hasFile('file')) {

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT'] . '/Storage/event/';
            $imge->move($storeLocation, $storeFileN);

            $dbsl = '/Storage/event/' . $storeFileN;

            @unlink(str_replace('/Storage', 'Storage', $event->img));
        }



        $event->title = $request->title;
        $event->img = $dbsl;
        $event->description = $request->description;
        $event->event_type = $request->event_type;
        $event->priority = $request->priority;
        $event->status = $request->status;

        $event->save();
        Alert::success('Success', 'event created successfully');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($event)
    {
        $getev = Event::where('id', '=', $event)->firstOrFail();
        $getev->delete();
        Alert::success('Success', 'event created successfully');
        return redirect()->route('event.index');
    }
}
