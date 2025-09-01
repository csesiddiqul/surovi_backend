<?php

namespace App\Http\Controllers;

use App\Models\importantLink;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class ImportantLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $importanLink = importantLink::all();
        return view('importanLink.index',compact('importanLink'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('importanLink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $this->validate($request,[
            'title' => 'required',
            'url' => 'required',
            'priority'=> 'required',
            'status' => 'required|numeric|in:1,2'
        ]);
        $importanLink = new importantLink();

        $importanLink->title = $request->title;
        $importanLink->url = $request->url;

        $importanLink->priority = $request->priority;
        $importanLink->status = $request->status;

        $importanLink->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\importantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function show(importantLink $importantLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\importantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $importantLink = importantLink::find($id);
        return view('importanLink.edit',compact('importantLink'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\importantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'title' => 'required',
            'url' => 'required',
            'priority'=> 'required',
            'status' => 'required|numeric|in:1,2'
        ]);
        $importantLink = importantLink::find($id);
        $importantLink->title = $request->title;
        $importantLink->url = $request->url;

        $importantLink->priority = $request->priority;
        $importantLink->status = $request->status;

        $importantLink->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\importantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = importantLink::count();

        $importantLink = importantLink::find($id);



        if($data > 15){

            $importantLink->delete();

            return redirect()->route('importanLink.index');
        }



        return redirect()->route('importanLink.index');
    }
}
