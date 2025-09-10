<?php

namespace App\Http\Controllers;

use App\Models\UpdateNews;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = UpdateNews::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('news', 'like', "%{$search}%");

            });
        }
        $results = $query->orderBy('created_at', 'DESC')->paginate(10);

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
         Alert::success('Success', 'UpdateNews created successfully');
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
    public function edit($id)
    {
        $updateNews = UpdateNews::where('id','=',$id)->first();
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
         Alert::success('Success', 'UpdateNews update successfully');
        return back()->with('message','Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpdateNews  $updateNews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $updateNews = UpdateNews::where('id','=',$id)->first();
        $updateNews->delete();
        Alert::success('Success', 'UpdateNews delete successfully');
        return redirect()->route('updateNews.index');
    }
}
