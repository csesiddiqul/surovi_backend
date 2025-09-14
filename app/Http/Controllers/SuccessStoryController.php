<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\SuccessStory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = SuccessStory::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('img', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $succesStorys = $query->orderBy('created_at', 'DESC')->paginate(10);
        return view('succesStory.index', compact('succesStorys'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('succesStory.create');
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

            'img' => 'required|file',
            'title' => 'required',
            'description' => 'nullable',
            'priority' => 'required',
            'status' => 'required| numeric|in:1,2'
        ]);



         $dbsl = ImageHelper::resizeAndSave($request->file('img'), '/Storage/achievement/', 414, 286);


        $succesStory= new SuccessStory();


        $succesStory->img = $dbsl;
        $succesStory->title = $request->title;
        $succesStory->description = $request->description;
        $succesStory->priority = $request->priority;
        $succesStory->status = $request->status;
        $succesStory->save();

        // return back()->with('message','Create Successfully');
         Alert::success('success', 'succesStory create successfully!');
        return redirect()->route('succesStory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuccessStory  $succesStory
     * @return \Illuminate\Http\Response
     */
    public function show(SuccessStory $succesStory)
    {
        return view('succesStory.edit', compact('succesStory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuccessStory  $succesStory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $succesStory = SuccessStory::where('id','=',$id)->first();
        return view('succesStory.edit', compact('succesStory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuccessStory  $succesStory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuccessStory $succesStory)
    {
        $this->validate($request, [
            'img' => 'nullable|file',
            'title' => 'required',
            'priority' => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);


         $dbsl = $succesStory->img;
            if ($request->hasFile('file')) {
                if ($succesStory->img && file_exists(public_path($succesStory->img))) {
                    @unlink(public_path($succesStory->img));
                }
                $dbsl = ImageHelper::resizeAndSave($request->file('img'), '/Storage/succesStory/', 414, 286);
            }

        $succesStory->img = $dbsl;
        $succesStory->title = $request->title;
        $succesStory->description = $request->description;
        $succesStory->priority = $request->priority;
        $succesStory->status = $request->status;

        $succesStory->save();
         Alert::success('success','succesStory update successfully!');
        return redirect()->route('succesStory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuccessStory  $succesStory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuccessStory $succesStory)
    {
        @unlink(str_replace('/Storage','Storage', $succesStory->img));
        $succesStory->delete();
        Alert::success('success','succesStory update successfully!');
        return redirect()->route('succesStory.index');
    }
}

