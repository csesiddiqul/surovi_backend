<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Achievement::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $results = $query->orderBy('created_at', 'DESC')->paginate(10);
        return view('achievement.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('achievement.create');
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
            'description' => 'nullable',
            'priority' => 'required',
            'status' => 'required| numeric|in:1,2'
        ]);

        $imge = $request->file('file');
        $storeFileN = time() . '_' . uniqid() . '.' . $imge->getClientOriginalExtension();

        $storeLocation = public_path('storage/achievement/');
        $imge->move($storeLocation, $storeFileN);

        $dbsl = '/storage/achievement/' . $storeFileN;


        $achievement = new achievement();
        $achievement->title = $request->title;
        $achievement->img = $dbsl;
        $achievement->description = $request->description;
        $achievement->priority = $request->priority;
        $achievement->status = $request->status;
        $achievement->save();

        // return back()->with('message','Create Successfully');

        return redirect()->route('achievement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(achievement $achievement)
    {
        return view('achievement.edit', compact('achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achievement = Achievement::where('id', '=', $id)->first();
        return view('achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, achievement $achievement)
    {
        $this->validate($request, [
            'title' => 'required',
            'file' => 'nullable|file',
            'priority' => 'required',
            'status' => 'required|numeric|in:1,2'
        ]);

        $dbsl = $achievement->img;
        if ($request->hasFile('file')) {

            $imge = $request->file;
            $storeFileN = time() . '_' . uniqid() . '.' . $imge->getClientOriginalExtension();
            $storeLocation = $_SERVER['DOCUMENT_ROOT'] . '/storage/achievement/';
            $imge->move($storeLocation, $storeFileN);

            $dbsl = '/storage/achievement/' . $storeFileN;

            @unlink(str_replace('/Storage', 'Storage', $achievement->img));
        }


        $achievement->title = $request->title;
        $achievement->img = $dbsl;
        $achievement->description = $request->description;
        $achievement->priority = $request->priority;
        $achievement->status = $request->status;

        $achievement->save();

        return redirect()->route('achievement.index')->with('message', 'Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(achievement $achievement)
    {
        @unlink(str_replace('/Storage', 'Storage', $achievement->Img));
        $achievement->delete();

        return redirect()->route('achievement.index');

    }
}
