<?php

namespace App\Http\Controllers;

use App\Models\videoGallery;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = videoGallery::all();

        return view('video_gallery.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('video_gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'file' => 'required',
                'description' => 'required',
                'priority'=> 'required',
                'status' => 'required|numeric|in:1,2'

            ]);




        $phga = new videoGallery();

        $phga->title = $request->title;
        $phga->video = str_replace('watch?v=','embed/',$request->file);
        $phga->description = $request->description;
        $phga->priority = $request->priority;
        $phga->status = $request->status;

        $phga->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\videoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(videoGallery $videoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\videoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $video = videoGallery::find($id);

        return view('video_gallery.edit',compact('video'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\videoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = videoGallery::find($id);

        $this->validate($request,
            [
                'title' => 'required',
                'file' => 'required',
                'description' => 'required',
                'priority'=> 'required',
                'status' => 'required|numeric|in:1,2'

            ]);




        $video->title = $request->title;
        $video->video = str_replace('watch?v=','embed/',$request->file);
        $video->description = $request->description;
        $video->priority = $request->priority;
        $video->status = $request->status;

        $video->save();

        return back()->with('message','Create Successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\videoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = videoGallery::find($id);

        unlink(str_replace('/Storage','Storage',$video->video));
        $video->delete();
        return redirect()->route('videogal.index');
    }
}
