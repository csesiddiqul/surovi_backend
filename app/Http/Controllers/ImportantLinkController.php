<?php

namespace App\Http\Controllers;

use App\Models\importantLink;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;
use RealRashid\SweetAlert\Facades\Alert;

class ImportantLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $query = importantLink::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('url', 'like', "%{$search}%");

                });
        }
        $importantLinks = $query->orderBy('created_at', 'DESC')->paginate(10);


        return view('importantLink.index',compact('importantLinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('importantLink.create');
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

        $importantLink = new importantLink();

        $importantLink->title = $request->title;
        $importantLink->url = $request->url;

        $importantLink->priority = $request->priority;
        $importantLink->status = $request->status;

        $importantLink->save();
         Alert::success('Success', 'importantLink created successfully');

        return redirect()->route('importantLink.index');
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
        return view('importantLink.edit',compact('importantLink'));
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
         Alert::success('Success', 'importantLink created successfully');
         return redirect()->route('importantLink.index');
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
        $importantLink->delete();
        Alert::success('Success', 'importantLink created successfully');
        return redirect()->route('importantLink.index');
    }
}
