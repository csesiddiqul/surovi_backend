<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donations;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class DonationsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index() //: Response
    {
        $donations = Donations::orderBy('priority', 'ASC')->get();
        return view('backend.page.donation.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //: Response
    {
        return view('backend.page.donation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //: RedirectResponse
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'status' => 'required',
                'type' => 'required',
                'image' => 'required',
            ],
            [
                'title.required' => 'Title is Required',
                'description.required' => 'Description is Required',
                'status.required' => 'Status is Required',
                'image.required' => 'Image is Required',
            ]
        );

        if ($request->file('image')) {
            $validated = $request->validate([
                'image' => ['required', 'file'],
            ]);

            $file = $request->file('image');
            $filename = time() . "-donation." . $file->getClientOriginalExtension();

            $donations = new Donations();
            $donations->title = $request->title;
            $donations->type = $request->type;
            $donations->description = $request->description;
            $donations->image = $filename;
            $donations->status = $request->status;
            $donations->priority = $request->priority;
            $donations->save();

            $file->move(public_path('backend/img/donation'), $filename);
            Alert::success('Added Successfully', 'Thank You');
            return to_route('donations.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show() //: Response
    {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($donation) //: Response
    {
        $donation = Donations::find($donation);
        return view('backend.page.donation.edit', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $donation) //: RedirectResponse
    {

        $request->validate(
            [
                'title' => 'required',
                'type' => 'required',
                'description' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Title is Required',
                'description.required' => 'Description is Required',
                'status.required' => 'Status is Required',
            ]
        );

        if ($request->file('image')) {
            $validated = $request->validate([
                'image' => ['required', 'file'],
            ]);

            $file = $request->file('image');
            $filename = time() . "-donation." . $file->getClientOriginalExtension();

            $donation = Donations::find($donation);

            $donation_img = $donation->image;
            $img_path = public_path('backend/img/donation/') . $donation_img;
            unlink($img_path);

            $donation->title = $request->title;
            $donation->description = $request->description;
            $donation->image = $filename;
            $donation->type = $request->type;
            $donation->status = $request->status;
            $donation->priority = $request->priority;
            $donation->update();

            $file->move(public_path('backend/img/donation'), $filename);
            Alert::success('Updated Successfully', 'Thank You');
            return to_route('donations.index');
        } else {

            $donation = Donations::find($donation);

            $donation->title = $request->title;
            $donation->description = $request->description;
            $donation->status = $request->status;
            $donation->priority = $request->priority;
            $donation->update();

            Alert::success('Updated Successfully', 'Thank You');
            return to_route('donations.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donations $donation) //: RedirectResponse
    {

        $donation_img = $donation->image;
        if ($donation_img != null) {
            $img_path = public_path('backend/img/donation/') . $donation_img;
            unlink($img_path);
        }

        $donation->delete();
        Alert::success('Deleted Successfully', 'Thank You');
        return back();
    }
}
