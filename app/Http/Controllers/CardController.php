<?php

namespace App\Http\Controllers;

use App\Models\card;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = card::all();
       return view('card.index',compact('card'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('card.create');
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
            'name' => 'required',

            'file' => 'required|file',
            'position'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'priority'=> 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/card/';
        $imge->move($storeLocation,$storeFileN);

        $dbsl = '/Storage/card/'.$storeFileN;




        $card = new card();

        $card->name = $request->name;
        $card->description = $request->description;
        $card->img = $dbsl;
        $card->position = $request->position;
        $card->mobile = $request->mobile;
        $card->email = $request->email;
        $card->priority = $request->priority;
        $card->status = $request->status;

        $card->save();

        return redirect()->route('card.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(card $card)
    {
        return view('card.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, card $card)
    {
        $this->validate($request,[
            'name' => 'required',

            'file' => 'nullable|file',
            'position'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'priority'=> 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $dbsl = $card->img;

if ($request->hasFile('file')){
    $imge = $request->file;
    $storeFileN = $imge->getClientOriginalName();
    $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/card/';
    $imge->move($storeLocation,$storeFileN);

    $dbsl = '/Storage/card/'.$storeFileN;
    @unlink(str_replace('/Storage','Storage',$card->img));
}


        $card->name = $request->name;
        $card->description = $request->description;
        $card->img = $dbsl;
        $card->position = $request->position;
        $card->mobile = $request->mobile;
        $card->email = $request->email;
        $card->priority = $request->priority;
        $card->status = $request->status;



        $card->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(card $card)
    {




            @unlink(str_replace('/Storage','Storage',$card->img));
            $card->delete();
            return redirect()->route('card.index');




        return redirect()->route('card.index');





    }
}
