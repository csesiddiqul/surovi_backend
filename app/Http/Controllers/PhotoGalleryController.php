<?php

namespace App\Http\Controllers;

use App\Models\photo_gallery;
use App\Models\photo_group;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photoGa = photo_gallery::all();
        $group = photo_group::all();

        return view('photo_gallery.index',compact('photoGa','group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photoGroup = photo_group::where('status', 1)->get();
        return view('photo_gallery.create',compact('photoGroup'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'file' => 'required|file',
                'description' => 'required',
                'group_id' => 'required',
                'priority'=> 'required',
                'status' => 'required|numeric|in:1,2'

            ]);

        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/photo_gallery/';
        $imge->move($storeLocation,$storeFileN);

        $dbsl = '/Storage/photo_gallery/'.$storeFileN;

        $phga = new photo_gallery();


        $phga->group_id = $request->group_id;
        $phga->title = $request->title;
        $phga->img = $dbsl;
        $phga->description = $request->description;
        $phga->priority = $request->priority;
        $phga->status = $request->status;

        $phga->save();
        Alert::success('Success', 'photo_admin created successfully');
       return redirect(route('photo_admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\photo_gallery  $photo_gallery
     * @return \Illuminate\Http\Response
     */
    public function show(photo_gallery $photo_gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photo_gallery  $photo_gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $photoGroup = photo_group::where('status', 1)->get();
        $photo = photo_gallery::find($id);

        return view('photo_gallery.edit',compact('photo','photoGroup'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photo_gallery  $photo_gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $photo = photo_gallery::find($id);

        $this->validate($request,
            [
                'group_id' => 'required',
                'title' => 'required',
                'file' => 'nullable|file',
                'priority'=> 'required',
                'status' => 'required|numeric|in:1,2'

            ]);

        $dbsl = $photo->img;

        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/photo_gallery/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/photo_gallery/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$photo->img));
        }
        $photo->group_id = $request->group_id;
        $photo->title = $request->title;
        $photo->img = $dbsl;
        $photo->description = $request->description;
        $photo->priority = $request->priority;
        $photo->status = $request->status;

        $photo->save();
        Alert::success('Success', 'photo_admin created successfully');
        return back()->with('message','Create Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\photo_gallery  $photo_gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = photo_gallery::find($id);
            unlink(str_replace('/Storage','Storage',$photo->img));
            $photo->delete();
            Alert::success('Success', 'photo_admin created successfully');
            return redirect()->route('photo_admin.index');

    }
}
