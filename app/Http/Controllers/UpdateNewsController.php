<?php

namespace App\Http\Controllers;

use App\Models\UpdateNews;
use Illuminate\Http\Request;

class UpdateNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = UpdateNews::all();

        return view('update_news.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('update_news.create');
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
            'news'=>'required',
            'priority'=>'required',
            'status'=>'numeric|in:1,2',
        ]);

        $updateNews = new UpdateNews();


        $updateNews->news = $request->news;
        $updateNews->priority = $request->priority;
        $updateNews->status = $request->status;

        $updateNews->save();
        return redirect()->route('updateNews.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpdateNews  $updateNews
     * @return \Illuminate\Http\Response
     */
    public function show(UpdateNews $updateNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpdateNews  $updateNews
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateNews $updateNews)
    {
        return view('update_news.edit',compact('updateNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpdateNews  $updateNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateNews $updateNews)
    {
        $this->validate($request,[
            'news'=>'required',
            'priority'=>'required',
            'status'=>'numeric|in:1,2',
        ]);



        $updateNews->news = $request->news;
        $updateNews->priority = $request->priority;
        $updateNews->status = $request->status;

        $updateNews->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpdateNews  $updateNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateNews $updateNews)
    {

            $updateNews->delete();
            return redirect()->route('updateNews.index');







    }
}
