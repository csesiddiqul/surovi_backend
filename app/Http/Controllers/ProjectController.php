<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = project::all();

        return view('project.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
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
            'file' => 'nullable|file',
            'Location' => 'nullable',
            'typeBenef' => 'required',
            'projectType' => 'required',
            'Priority' => 'required',
            'status' => 'required | numeric|in:1,2'
        ]);


        if ($request->file){
            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/page/';
            $imge->move($storeLocation,$storeFileN);
            $dbsl = '/Storage/page/'.$storeFileN;
        }else{
            $dbsl = '';
        }

        $projectData = new project();
        $projectData->title = $request->title;
        $projectData->location_data= $request->Location;
        $projectData->typeBenef = $request->typeBenef;
        $projectData->projectType = $request->projectType;
        $projectData->Priority = $request->Priority;
        $projectData->img = $dbsl;
        $projectData->location_data = $request->Location;
        $projectData->status = $request->status;

        $projectData->save();
        Alert::success('Success', 'project created successfully');
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectData = project::find($id);

        return view('project.edit',compact('projectData'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {



        $projectData = project::find($id);



        $this->validate($request, [
            'title' => 'required',
            'file' =>  'nullable|file',
            'Location' => 'required',
            'typeBenef' => 'required',
            'projectType' => 'required',
            'Priority' => 'required',
            'status' => 'required | numeric|in:1,2'
        ]);



        $dbsl = $projectData->img;

        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/projectPhoto/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/projectPhoto/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$projectData->img));
        }



        $projectData->title = $request->title;
        $projectData->img = $dbsl;
        $projectData->location_data= $request->Location;
        $projectData->typeBenef = $request->typeBenef;
        $projectData->projectType = $request->projectType;
        $projectData->Priority = $request->Priority;
        $projectData->status = $request->status;


        $projectData->save();

        Alert::success('Success', 'project created successfully');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = project::find($id);
        if($project->img){
            @unlink(str_replace('/Storage','Storage',$project->img));
        }

        $project->delete();
        return redirect()->route('project.index');
        
    }
}
