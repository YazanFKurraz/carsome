<?php

namespace App\Http\Controllers\FrontController;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(Request $request )
    {
        ContactUs::create($request->all());
        return back()->with('success','message sent successfully');
    }
}
