<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Utils;
use PhpParser\Node\Stmt\Return_;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = slider::all();
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

        $imge = $request->file;
        $storeFileN = $imge->getClientOriginalName();
        $storeLocation = $_SERVER['DOCUMENT_ROOT'] . '/Storage/slider/';
        $imge->move($storeLocation, $storeFileN);

        $dbsl = '/Storage/slider/' . $storeFileN;




        $slider = new slider();

        $slider->title = $request->title;
        $slider->url = $dbsl;
        $slider->priority = $request->priority;
        $slider->status = $request->status;

        $slider->save();

        // return back()->with('message','Create Successfully');

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
    public function update(Request $request, slider $slider)
    {

        $this->validate($request, [
            'title' => 'required',
            'file' => 'nullable|file',
            'priority' => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $dbsl = $slider->url;
        if ($request->hasFile('file')) {

            $imge = $request->file;
            $storeFileN = $imge->getClientOriginalName();
            $storeLocation = $_SERVER['DOCUMENT_ROOT'] . '/Storage/slider/';
            $imge->move($storeLocation, $storeFileN);

            $dbsl = '/Storage/slider/' . $storeFileN;

            @unlink(str_replace('/Storage', 'Storage', $slider->url));
        }


        $slider->title = $request->title;
        $slider->url = $dbsl;
        $slider->priority = $request->priority;
        $slider->status = $request->status;

        $slider->save();

        return back()->with('message', 'Create Successfully');
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
