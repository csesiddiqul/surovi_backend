<?php

namespace App\Http\Controllers;

use App\Models\documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = documents::all();

        return view('documents.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,[
                'title' => 'required',
                'file' => 'required|file',
                'date' => 'required',
                'priority'=> 'required',
                'status' => 'required| numeric|in:1,2'
            ]
        );


        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/documents/';
        $imge->move($storeLocation,$storeFileN);

        $dbsl = '/Storage/documents/'.$storeFileN;

        $document = new documents();

        $document->title = $request->title;
        $document->file = $dbsl;
        $document->date = $request->date;
        $document->priority = $request->priority;
        $document->status = $request->status;


        $document->save();

        return redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(documents $documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit($docid)
    {
        $documents = documents::find($docid);

        return view('documents.edit',compact('documents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $docid)
    {
        $document = documents::find($docid);

        $this->validate(
            $request,[
                'title' => 'required',
                'file' => 'nullable|file',
                'date' => 'required',
                'priority'=> 'required',
                'status' => 'required| numeric|in:1,2'
            ]
        );

        $dbsl = $document->file;

        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/documents/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/documents/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$document->file));
        }


        $document->title = $request->title;
        $document->file = $dbsl;
        $document->date = $request->date;
        $document->priority = $request->priority;
        $document->status = $request->status;


        $document->save();

        return back()->with('message','Create Successfully');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $doc = documents::find($id);
        unlink(str_replace('/Storage','Storage',$doc->file));
        $doc->delete();
        return redirect()->route('documents.index');
    }
}
