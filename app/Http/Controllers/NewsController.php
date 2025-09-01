<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::all();

        return view('news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
            'file' => 'required|file',
            'priority'=> 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/news/';
        $imge->move($storeLocation,$storeFileN);

        $dbsl = '/Storage/news/'.$storeFileN;




        $news = new news();

        $news->title = $request->title;
        $news->img = $dbsl;
        $news->description = $request->description;
        $news->priority = $request->priority;
        $news->status = $request->status;

        $news->save();

        //return back()->with('message','Create Successfully');


        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        return view('news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {
        $this->validate($request,[
            'title' => 'required',

            'file' =>'nullable|file',

            'description' => 'required',

            'priority'=> 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $dbsl = $news->img;

        if ($request->hasFile('file')){
            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/news/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/news/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$news->img));

        }


        $news->title = $request->title;
        $news->img = $dbsl;
        $news->description = $request->description;
        $news->Priority  = $request->priority;
        $news->status = $request->status;

        $news->save();



        return back()->with('message','Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($news)
    {
        $news = news::where('id', '=', $news)->firstOrFail();
        $news->delete();
        return redirect()->route('news.index');
    }
}
