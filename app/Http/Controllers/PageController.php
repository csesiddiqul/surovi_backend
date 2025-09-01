<?php

namespace App\Http\Controllers;

use App\Models\page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = page::all();

        return view('pages.index' ,compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




         $rid = $request->prantsid;

         $lis = page::find($rid);



         if($lis){

             return 'alredi page carate';
         }


        $this->validate($request,[
            'prantsid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'file' => 'nullable|file',
            'status' => 'required| numeric|in:1,2'
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



        $page = new page();
        $page->id = $request->prantsid;
        $page->title = $request->title;
        $page->description = $request->description;


        $page->img = $dbsl;

        $page->manuid = $request->prantsid;

        $page->status = $request->status;
        $page->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(page $page)
    {
        return view('pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, page $page)
    {




        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'file' => 'nullable|file',
            'status' => 'required|numeric|in:1,2'
        ]);

        $dbsl = $page->img;

        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/page/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/page/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$page->img));
        }



        $page->title = $request->title;
        $page->img = $dbsl;
        $page->description = $request->description;
        $page->status = $request->status;

        $page->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(page $page)
    {



		if($page->img){
			@unlink(str_replace('/Storage','Storage',$page->img));

			$page->delete();
			return redirect()->route('page.index');

		}else{

		$page->delete();
        return redirect()->route('page.index');

		}



    }
}
