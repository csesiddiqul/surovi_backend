<?php

namespace App\Http\Controllers;

use App\Models\jobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobAppli = jobApplication::all();

        return view('JobApplication.index',compact('jobAppli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JobApplication.create');
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
            'Location' => 'required',
            'Type' => 'required',

            'status' => 'required | numeric|in:1,2'
        ]);

        $jobdata = new jobApplication();

        $jobdata->title = $request->title;
        $jobdata->Type = $request->Type;
        $jobdata->location = $request->Location;
        $jobdata->status = $request->status;

        $jobdata->save();

        return redirect()->route('JobApplication.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show(jobApplication $jobApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobAppli = jobApplication::find($id);

        return view('JobApplication.edit',compact('jobAppli'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jobdata = jobApplication::find($id);

        $this->validate($request, [
            'title' => 'required',
            'Location' => 'required',
            'Type' => 'required',

            'status' => 'required | numeric|in:1,2'
        ]);


        $jobdata->title = $request->title;
        $jobdata->Type = $request->Type;
        $jobdata->location = $request->Location;
        $jobdata->status = $request->status;

        $jobdata->save();

        return redirect()->route('JobApplication.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobdata = jobApplication::find($id);

        $jobdata->delete();

        return redirect()->route('JobApplication.index');
    }
}
