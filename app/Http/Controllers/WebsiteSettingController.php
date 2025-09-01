<?php

namespace App\Http\Controllers;

use App\Models\websiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websetting = websiteSetting::all();
        return view('websiteSetting.index',compact('websetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('websiteSetting.create');
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

            'map' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'weblink' => 'required',
            'fblink' => 'required',
            'twitlink' => 'required',
            'inslink' => 'required',

            'priority'=> 'required',
            'status' => 'required| numeric|in:1,2'
        ]);

        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/logo/';
        $imge->move($storeLocation,$storeFileN);

        $dbsl = '/Storage/logo/'.$storeFileN;



        $websetting = new websiteSetting();

        $websetting->logo = $dbsl;

        $websetting->mapUrl = $request->map;
        $websetting->phone = $request->phone;
        $websetting->email = $request->email;
        $websetting->websiteLink = $request->weblink;
        $websetting->twitter = $request->twitlink;
        $websetting->facbookLink = $request->fblink;
        $websetting->instagram = $request->inslink;

        $websetting->priority = $request->priority;
        $websetting->status = $request->status;

        $websetting->save();

        return back()->with('message','Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\websiteSetting  $websiteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(websiteSetting $websiteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\websiteSetting  $websiteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $websiteSetting = websiteSetting::find($id);
        return view('websiteSetting.edit',compact('websiteSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\websiteSetting  $websiteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $websiteSetting = websiteSetting::find($id);





        $this->validate($request,[


            'file' => 'nullable|file',

            'map' => 'required',
            'logoName' => 'required',
            'logoName' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'weblink' => 'required',
            'fblink' => 'required',
            'twitlink' => 'required',
            'inslink' => 'required',

            'priority'=> 'required',
            'status' => 'required| numeric|in:1,2'
        ]);

        $dbsl = $websiteSetting->logo;

        if ($request->hasFile('file')) {

            $imge = $request->file;

            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT'] . '/Storage/logo/';
            $imge->move($storeLocation, $storeFileN);

            $dbsl = '/Storage/logo/' . $storeFileN;

            @unlink(str_replace('/Storage', 'Storage', $websiteSetting->logo));


        }

        $websiteSetting->logo = $dbsl;
        $websiteSetting->mapUrl = $request->map;
        $websiteSetting->logo_name = $request->logoName;

        $websiteSetting->address = $request->address;

        $websiteSetting->phone = $request->phone;
        $websiteSetting->email = $request->email;
        $websiteSetting->websiteLink = $request->weblink;
        $websiteSetting->twitter = $request->twitlink;
        $websiteSetting->facbookLink = $request->fblink;
        $websiteSetting->instagram = $request->inslink;

        $websiteSetting->priority = $request->priority;
        $websiteSetting->status = $request->status;

        $websiteSetting->save();

        return back()->with('message','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\websiteSetting  $websiteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(websiteSetting $websiteSetting)
    {

    }
}
