<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();

        return view('menu.index', compact('menu'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'prantsid' => 'required',
            'type' => 'required|numeric|in:1,2',
            'slug' => 'required',

            'priority' => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);


        $manu = new Menu();

        $manu->name = $request->name;
        $manu->prantsId = $request->prantsid;
        $manu->type = $request->type;
        $manu->slug = $request->slug;
        $manu->menu_type = $request->type;
        $manu->Priority = $request->priority;
        $manu->status = $request->status;

        $manu->save();

        return back()->with('message', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\menu $menubar
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menubar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\menu $menubar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menu.edit', compact('menu'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\menu $menubar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $manu = Menu::find($id);


        $this->validate($request,
            [
                'name' => 'required',
                'slug' => 'required',
                'priority' => 'required',
                'status' => 'required|numeric|in:1,2'

            ]);
        $manu->name = $request->name;
        $manu->prantsId = $request->prantsId;
        $manu->type = $request->type;
        $manu->slug = $request->slug;
        $manu->Priority = $request->priority;
        $manu->status = $request->status;

        $manu->save();

        return back()->with('message', 'Create Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\menu $menubar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $mid = Menu::find($id);
        if ($mid->menu_type == 2)
            $mid->delete();

        return redirect()->route('manu.index');

    }
}
