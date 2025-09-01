<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donateinfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class DonateinfoController extends Controller
{


    public function index() //: Response
    {
        $donateinfo = Donateinfo::with('donation')->get();
        return view('backend.page.donate_info.index', compact('donateinfo'));
    }

    public function show($id) //: Response
    {
        $donateinfo = Donateinfo::find($id);
        return view('backend/pages/donate_info/view', compact('donateinfo'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'account' => 'required',
            'dnumber' => ['required', 'regex:/^(01)[3-9][0-9]{8}$/'],
            'rnumber' => 'required',
            'txnid' => 'required',

        ]);


        Donateinfo::create([
            'name' => $request->input('name'),
            'account' => $request->input('account'),
            'donation_id' =>  $request->input('donation_id'),
            'dnumber' => $request->input('dnumber'),
            'rnumber' => $request->input('rnumber'),
            'txnid' => $request->input('txnid'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Donation submitted successfully!');
    }



    public function destroy($id)
    {
        $donateinfo = Donateinfo::find($id);
        $donateinfo->delete();
        Alert::success('Deleted Successfully', 'Thank You');
        return back();
    }
}
