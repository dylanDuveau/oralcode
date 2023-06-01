<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{

    Public function formulaire()
    {
    $request->input('numero');
     return view('formulaire');
    }
}
