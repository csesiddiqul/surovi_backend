<?php

namespace App\Http\Controllers;

use App\Models\mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageData = mission::all();
        return view('missionVision.index',compact('pageData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $develop = mission::find($id);

        return view('missionVision.edit',compact('develop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $developPage = mission::find($id);

        $this->validate($request,[

            'title' => 'nullable',
            'description' => 'nullable',
            'file' => 'nullable|file',


            'title2' => 'nullable',
            'description2' => 'nullable',

            'title3' => 'nullable',
            'description3' => 'nullable',

            'title4' => 'nullable',
            'description4' => 'nullable',


            'priority'=> 'required',
            'status' => 'required|numeric|in:1,2'

        ]);

        $dbsl = $developPage->img;

        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/missionPage/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/missionPage/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$developPage->img));
        }



        $developPage->title_one = $request->title;

        $developPage->img = $dbsl;
        $developPage->description_one = $request->description;



        $developPage->title_tow = $request->title2;
        $developPage->description_tow = $request->description2;


        $developPage->title_three = $request->title3;
        $developPage->description_three = $request->description3;

        $developPage->title_four = $request->title4;
        $developPage->description_four = $request->description4;

        $developPage->priority = $request->priority;
        $developPage->status = $request->status;

        $developPage->save();

        return back()->with('message','Create Successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(mission $mission)
    {
        //
    }
}
