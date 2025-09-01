<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class contactController extends Controller
{
    public function sendEmail(Request $request)
    {



    $data=[
        'email'=>$request->email,
        'message' =>$request->message,
        'name' =>$request->name
    ];




    Mail::to('siddiqulcsebd@gmail.com')->send(new contactMail($data));
    return 'Things For Information ...';
    }


}
