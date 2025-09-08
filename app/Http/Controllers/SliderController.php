<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Slider::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }
        $results = $query->orderBy('created_at', 'DESC')->paginate(10);
        return view('slider.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
            'title' => 'required',
            'file' => 'required|file',
            'priority' => 'required',
            'status' => 'required| numeric|in:1,2'
        ]);
        $dbsl = ImageHelper::resizeAndSave($request->file('file'), '/Storage/slider/', 1296, 505);
        $slider = new slider();
        $slider->title = $request->title;
        $slider->url = $dbsl;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();

        Alert::success('Success', 'Slider created successfully');
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(slider $slider) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(slider $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title'    => 'required',
            'file'     => 'nullable|file|image',
            'priority' => 'required',
            'status'   => 'required|numeric|in:1,2'
        ]);

        $dbsl = $slider->url;

        if ($request->hasFile('file')) {
            if ($slider->url && file_exists(public_path($slider->url))) {
                @unlink(public_path($slider->url));
            }
            $dbsl = ImageHelper::resizeAndSave($request->file('file'), '/Storage/slider/', 1296, 505);
        }
        $slider->title    = $request->title;
        $slider->url      = $dbsl;
        $slider->priority = $request->priority;
        $slider->status   = $request->status;
        $slider->save();
        Alert::success('Success', 'Slider Update successfully');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(slider $slider)
    {
        @unlink(str_replace('/Storage', 'Storage', $slider->url));
        $slider->delete();
        return redirect()->route('slider.index');
    }
}
