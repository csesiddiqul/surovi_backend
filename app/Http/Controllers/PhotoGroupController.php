<?php

namespace App\Http\Controllers;

use App\Models\photo_group;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $query = photo_group::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('group_name', 'like', "%{$search}%")
                        ->orWhere('img', 'like', "%{$search}%");
                });
        }
        $gpds = $query->orderBy('created_at', 'DESC')->paginate(10);
        return view('photo_group.index',compact('gpds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo_group.create');
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
                'groupName' => 'required',
                'file' => 'required|file',
                'priority'=> 'required',
                'status' => 'required|numeric|in:1,2'

            ]);

        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/photo_group/';
        $imge->move($storeLocation,$storeFileN);

        $dbsl = '/Storage/photo_group/'.$storeFileN;

        $group = new photo_group();



        $group->group_name = $request->groupName;
        $group->img = $dbsl;
        $group->priority = $request->priority;
        $group->status = $request->status;

        $group->save();
        Alert::success('Success', 'photo_group created successfully');
        return redirect(route('photogroup.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\photo_group  $photo_group
     * @return \Illuminate\Http\Response
     */
    public function show(photo_group $photo_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photo_group  $photo_group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $grupData = photo_group::find($id);

        return view('photo_group.edit',compact('grupData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photo_group  $photo_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = photo_group::find($id);

        $this->validate($request,
            [
                'groupName' => 'required',
                'file' => 'nullable|file',
                'priority'=> 'required',
                'status' => 'required|numeric|in:1,2'

            ]);

        $dbsl = $group->img;
        if ($request->hasFile('file')){

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT']. '/Storage/photo_group/';
            $imge->move($storeLocation,$storeFileN);

            $dbsl = '/Storage/photo_group/'.$storeFileN;

            @unlink(str_replace('/Storage','Storage',$group->img));
        }

        $group->group_name = $request->groupName;
        $group->img = $dbsl;
        $group->priority = $request->priority;
        $group->status = $request->status;

        $group->save();
          Alert::success('Success', 'photo_group update successfully');

        return redirect(route('photogroup.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\photo_group  $photo_group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = photo_group::find($id);
        unlink(str_replace('/Storage','Storage',$group->img));
        $group->delete();
        Alert::success('Success', 'photo_group delete successfully');
        return redirect()->route('photogroup.index');

    }
}
