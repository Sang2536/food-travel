<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function article()
    {
        return view('templates/article');
    }

    public function service()
    {
        return view('templates/service');
    }

    public function aboutUs()
    {
        return view('templates/about_us');
    }
}
