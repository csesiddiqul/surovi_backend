<?php

namespace App\Http\Controllers;

use App\Models\slogan;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class SloganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $results = slogan::all();
       return view('slogan.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slogan.create');
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
            'file' => 'required|file',
            'slogan'  => 'required',
            'status' => 'required| numeric|in:1,2'
        ]);


        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/slogan/';
        $imge->move($storeLocation,$storeFileN);

        $dbsl = '/Storage/slogan/'.$storeFileN;


        $slogan = new slogan();
        $slogan->file = $dbsl;
        $slogan->slogan = $request->slogan;
        $slogan->status = $request->status;
        $slogan->save();

        return redirect()->route('slogan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function show(slogan $slogan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function edit(slogan $slogan)
    {
        return view('slogan.edit',compact('slogan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slogan $slogan)
    {
        $this->validate($request,[
            'file' => 'nullable|file',
            'slogan'  => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $dbsl = $slogan->file;


        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/slogan/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/slogan/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$slogan->file));
        }



        $slogan->file = $dbsl;
        $slogan->slogan = $request->slogan;
        $slogan->status = $request->status;

        $slogan->save();

   return redirect()->route('slogan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function destroy(slogan $slogan)
    {
        @unlink(str_replace('/Storage','Storage',$slogan->file));
        $slogan->delete();
        return redirect()->route('slogan.index');

    }
}
