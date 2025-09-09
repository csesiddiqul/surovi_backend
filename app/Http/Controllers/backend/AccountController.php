<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) //: Response
    {

        $query = Account::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('image', 'like', "%{$search}%")
                        ->orWhere('description','like',"%{$search}%");
                });
        }
        $accounts = $query->orderBy('created_at', 'DESC')->paginate(1);


        return view('backend.page.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //: Response
    {
        return view('backend.page.account.create');
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
            $filename = time() . "-account." . $file->getClientOriginalExtension();

            $account = new Account();
            $account->title = $request->title;
            $account->description = $request->description;
            $account->image = $filename;
            $account->status = $request->status;
            $account->priority = $request->priority;
            $account->save();

            $file->move(public_path('backend/img/account'), $filename);
            Alert::success('Added Successfully', 'Thank You');
            return to_route('account.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($account) //: Response
    {
        $account = Account::find($account);
        return view('backend.page.account.view', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($account) //: Response
    {
        $account = Account::find($account);
        return view('backend.page.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $account) //: RedirectResponse
    {

        $request->validate(
            [
                'title' => 'required',
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
            $filename = time() . "-account." . $file->getClientOriginalExtension();

            $account = Account::find($account);

            $account_img = $account->image;
            $img_path = public_path('backend/img/account/') . $account_img;
            unlink($img_path);

            $account->title = $request->title;
            $account->description = $request->description;
            $account->image = $filename;
            $account->status = $request->status;
            $account->priority = $request->priority;
            $account->update();

            $file->move(public_path('backend/img/account'), $filename);
            Alert::success('Updated Successfully', 'Thank You');
            return to_route('account.index');
        } else {

            $account = Account::find($account);

            $account->title = $request->title;
            $account->description = $request->description;
            $account->status = $request->status;
            $account->priority = $request->priority;
            $account->update();

            Alert::success('Updated Successfully', 'Thank You');
            return to_route('account.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account) //: RedirectResponse
    {

        $account_img = $account->image;
        if ($account_img != null) {
            $img_path = public_path('backend/img/account/') . $account_img;
            unlink($img_path);
        }

        $account->delete();
        Alert::success('Deleted Successfully', 'Thank You');
        return back();
    }
}
