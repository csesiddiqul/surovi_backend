<?php

namespace App\Http\Controllers;

use App\Models\Sdg;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SdgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Sdg::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('goal', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%")
                        ->orWhere('description','like',"%{$search}%");
                });
        }
        $sdgs = $query->orderBy('created_at', 'DESC')->paginate(10);


        return view('sdg.index', compact('sdgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sdg.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'goal' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|integer',
            'status' => 'required|in:1,2',
            'file' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);



        // 2. Handle image upload
        $imagePath = null;
        if ($request->hasFile('file')) {
            $storedPath = $request->file('file')->store('uploads/images', 'public');
            $imagePath = '/storage/' . $storedPath;
        }

        // 3. Generate a unique slug from title
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Sdg::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // 4. Create and save the data
        $sdg = Sdg::create([
            'goal' => $validated['goal'],
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'img' => $imagePath,
            'priority' => $validated['priority'],
            'status' => $validated['status'],
        ]);

        // 5. Redirect with success message
        Alert::success('Success', 'Sdg created successfully');
        return redirect()->route('sdg.index')->with('success', 'SDG created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function show(Sdg $sdg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function edit(Sdg $sdg)
    {
        return view('sdg.edit', compact('sdg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 1. Find the existing SDG item
        $sdg = Sdg::findOrFail($id);

        // 2. Validate incoming data
        $validated = $request->validate([
            'goal' => ($id == 1) ? 'nullable|string|max:255' : 'required|string|max:255',
            'title' => ($id == 1) ? 'nullable|string|max:255' : 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => ($id == 1) ? 'nullable|integer' : 'required|integer',
            'status' => ($id == 1) ? 'nullable|in:1,2' : 'required|in:1,2',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // 3. Generate a unique slug from title
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Sdg::where('slug', $slug)->where('id', '!=', $sdg->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // 4. Handle new image upload if provided
        if ($request->hasFile('file')) {
            // Delete old image if exists
            if ($sdg->img && file_exists(public_path($sdg->img))) {
                unlink(public_path($sdg->img));
            }

            $storedPath = $request->file('file')->store('uploads/images', 'public');
            $imagePath = '/storage/' . $storedPath;
        } else {
            $imagePath = $sdg->img; // keep old image
        }

        // 5. Update the data
        $sdg->update([
            'goal'        => $validated['goal']        ?? $sdg->goal,
            'title'       => $validated['title']       ?? $sdg->title,
            'slug'        => $slug,
            'description' => $validated['description'] ?? $sdg->description,
            'img'         => $imagePath                ?? $sdg->img,
            'priority'    => $validated['priority']    ?? $sdg->priority,
            'status'      => $validated['status']      ?? $sdg->status,
        ]);

        // 6. Redirect back
        Alert::success('Success', 'Sdg created successfully');
        return redirect()->route('sdg.index')->with('success', 'SDG updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sdg $sdg)
    {
        $sdg->delete();
        Alert::success('Success', 'Sdg created successfully');
        return redirect()->route('sdg.index')->with('success', 'SDG Delete successfully!');
    }
}
