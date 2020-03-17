<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $name = "MUSLIKHUL ADIB";
        return view('welcome', ['name' => $name]);
    }
   
    public function portfolio()
    {
        return view('portfolio');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
