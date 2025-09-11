<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\SponsorChild;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SponsorChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = SponsorChild::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%")
                    ->orWhere('description','like',"%{$search}%");
            });
        }
        $sponsorChilds = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('sponsorChild.index',compact('sponsorChilds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsorChild.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'file' => 'required|file',
            'description'=> 'nullable',
            'priority' => 'required',
            'status' => 'required| numeric|in:1,2'
        ]);


        $dbsl = ImageHelper::resizeAndSave($request->file('file'), '/Storage/sponsorChild/', 414, 286);


        $sponsorChild = new sponsorChild();

        $sponsorChild->name = $request->name;
        $sponsorChild->phone_number = $request->phone_number;
        $sponsorChild->img = $dbsl;
        $sponsorChild->description = $request->description;
        $sponsorChild->priority = $request->priority;
        $sponsorChild->status = $request->status;
        $sponsorChild->save();

        // return back()->with('message','Create Successfully');
        Alert::success('Success', 'SponsorChild created successfully');
        return redirect()->route('sponsorChild.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorChild  $sponsorChild
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorChild $sponsorChild)
    {
        return view('sponsorChild.edit', compact('sponsorChild'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorChild  $sponsorChild
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsorChild = SponsorChild::where('id','=',$id)->first();
        return view('sponsorChild.edit', compact('sponsorChild'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorChild  $sponsorChild
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorChild $sponsorChild)
    {
         $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'file' => 'nullable|file',
            'description' => 'required',
            'priority' => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);



           $dbsl = $sponsorChild->img;
            if ($request->hasFile('file')) {
                if ($sponsorChild->img && file_exists(public_path($sponsorChild->img))) {
                    @unlink(public_path($sponsorChild->img));
                }
                $dbsl = ImageHelper::resizeAndSave($request->file('img'), '/Storage/sponsorChild/', 414, 286);
            }


        $sponsorChild->name = $request->name;
        $sponsorChild->phone_number = $request->phone_number;
        $sponsorChild->img = $dbsl;
        $sponsorChild->description = $request->description;
        $sponsorChild->priority = $request->priority;
        $sponsorChild->status = $request->status;

        $sponsorChild->save();
        Alert::success('Success', 'SponsorChild update successfully');
        return redirect()->route('sponsorChild.index')->with('message', 'Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorChild  $sponsorChild
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorChild $sponsorChild)
    {
        @unlink(str_replace('/Storage', 'Storage', $sponsorChild->Img));
        $sponsorChild->delete();
        Alert::success('Success', 'SponsorChild delete successfully');
        return redirect()->route('sponsorChild.index');
    }
}
