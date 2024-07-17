<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function error()
    {
        $error = 'This is error page.';

        return view(
            'templates/error', 
            ['error' => $error]
        );
    }
}
