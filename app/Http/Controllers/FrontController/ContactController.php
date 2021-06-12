<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function about_us()
    {
        return view('front.contact.about_us');
    }

    public function contact_us()
    {
        return view('front.contact.contact_us');
    }
}
