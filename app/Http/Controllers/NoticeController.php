<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Notice::all();
        return view('notice.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.create');
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
           'file' => 'nullable|file',
           'priority'=>'required',
           'status' => 'required | numeric|in:1,2'
       ]);

        if ($request->file){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/noticeData/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/noticeData/'.$storeFileN;
        }else{
            $dbsl = '';
        }



       $notice = new Notice();
       $notice->title = $request->title;
       $notice->description = $request->description;
       $notice->file = $dbsl;
       $notice->priority = $request->priority;
       $notice->status = $request->status;
       $notice->save();

       //return back();
        return redirect()->route('notice.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('notice.show',compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('notice.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $this->validate($request,[
            'title' => 'required',
            'file' => 'nullable|file',
            'priority'=>'required',
            'status' => 'required | numeric|in:1,2'
        ]);

        $dbsl = $notice->file;

        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/noticeData/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/noticeData/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$notice->file));
        }



        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->file = $dbsl;
        $notice->priority = $request->priority;
        $notice->status = $request->status;

        $notice->save();




        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {










        $getlist = Notice::count();


        if($notice->file){
            @unlink(str_replace('/Storage','Storage',$notice->file));

            $notice->delete();

            return redirect()->route('notice.index');

        }else{

            $notice->delete();
            return redirect()->route('notice.index');

        }


        return redirect()->route('notice.index');
    }
}
