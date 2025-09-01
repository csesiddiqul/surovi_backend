<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;
use mysql_xdevapi\CrudOperationBindable;
use phpDocumentor\Reflection\Utils;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = service::all();
        return view('service.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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
            'icon' => 'required',
            'title' => 'required',

            'status' => 'required | numeric|in:1,2'
        ]);
        $service = new service();

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;

        $service->save();

        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
//

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {

       return view('service.edit',compact('service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {



        $this->validate($request, [
            'icon' => 'required',
            'title' => 'required',

            'status' => 'required | numeric|in:1,2'
        ]);


        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;

        $service->save();


        return back()->with('message','Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {


        $getslider = service::count();


        if($getslider > 3){

            $service->delete();

            return redirect()->route('service.index');
        }



        return redirect()->route('service.index');

    }
}
