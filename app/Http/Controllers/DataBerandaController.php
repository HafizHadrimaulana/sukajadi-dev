<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataBerandaController extends Controller
{
    public function data()
    {
        return view('page.publik.data');
    }
}
