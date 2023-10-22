<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function conferences()
    {
        return view('admin.conferences');
    }

    public function speakers()
    {
        return view('admin.speakers');
    }

    public function partners()
    {
        return view('admin.partners');
    }
}
