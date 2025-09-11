<?php

namespace App\Http\Controllers;

use App\Models\AdvisoryCommittee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\ImageHelper;

class AdvisoryCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = advisoryCommittee::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('img', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%")
                        ->orWhere('designation', 'like', "%{$search}%");
                });
        }
        $results = $query->orderBy('created_at', 'DESC')->paginate(10);
        return view('advisoryCommittee.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advisoryCommittee.create');
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
            'img' => 'required|file',
            'title' => 'required',
            'designation' => 'required',
            'priority' => 'required',
            'status' => 'required| numeric|in:1,2'
        ]);

        $dbsl = ImageHelper::resizeAndSave($request->file('img'), '/Storage/advisoryCommittee/', 270, 271);

        $advisoryCommittee = new advisoryCommittee();
        $advisoryCommittee->img = $dbsl;
        $advisoryCommittee->title = $request->title;
        $advisoryCommittee->designation = $request->designation;
        $advisoryCommittee->priority = $request->priority;
        $advisoryCommittee->status = $request->status;
        $advisoryCommittee->save();
         Alert::success('success','advisoryCommittee create successfully!');
        return redirect()->route('advisoryCommittee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvisoryCommittee  $advisoryCommittee
     * @return \Illuminate\Http\Response
     */
    public function show(AdvisoryCommittee $advisoryCommittee)
    {
           return view('advisoryCommittee.edit', compact('advisoryCommittee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvisoryCommittee  $advisoryCommittee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advisoryCommittee = AdvisoryCommittee::where('id', '=', $id)->first();
        return view('advisoryCommittee.edit', compact('advisoryCommittee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvisoryCommittee  $advisoryCommittee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvisoryCommittee $advisoryCommittee)
    {

        $this->validate($request, [
            'img'     => 'nullable|file',
            'title'    => 'required',
            'designation'    => 'required',
            'priority' => 'required',
            'status'   => 'required|numeric|in:1,2'
        ]);

            $dbsl = $advisoryCommittee->img;
            if ($request->hasFile('img')) {
                if ($advisoryCommittee->img && file_exists(public_path($advisoryCommittee->img))) {
                    @unlink(public_path($advisoryCommittee->img));
                }
                $dbsl = ImageHelper::resizeAndSave($request->file('img'), '/Storage/advisoryCommittee/', 1296, 505);
            }
            
        $advisoryCommittee->img      = $dbsl;
        $advisoryCommittee->title    = $request->title;
        $advisoryCommittee->designation    = $request->designation;
        $advisoryCommittee->priority = $request->priority;
        $advisoryCommittee->status   = $request->status;
        $advisoryCommittee->save();
        Alert::success('Success', 'advisoryCommittee Update successfully');
        return redirect()->route('advisoryCommittee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvisoryCommittee  $advisoryCommittee
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvisoryCommittee $advisoryCommittee)
    {
        @unlink(str_replace('/Storage', 'Storage', $advisoryCommittee->Img));
        $advisoryCommittee->delete();
        Alert::success('success','advisoryCommittee delete successfully!');
        return redirect()->route('advisoryCommittee.index');
    }
}
