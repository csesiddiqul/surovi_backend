<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\card;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;
use RealRashid\SweetAlert\Facades\Alert;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = card::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('img','like',"%{$search}%");
                });
        }
        $cards = $query->orderBy('created_at', 'DESC')->paginate(10);
       return view('card.index',compact('cards'));
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


        $dbsl = ImageHelper::resizeAndSave($request->file('file'), '/Storage/card/', 270, 271);


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
        Alert::success('Success', 'card created successfully');

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

if
($request->hasFile('file')){
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
        Alert::success('Success', 'card update successfully');
         return redirect()->route('card.index');
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
        Alert::success('Success', 'card delete successfully');
        return redirect()->route('card.index');

    }
}
