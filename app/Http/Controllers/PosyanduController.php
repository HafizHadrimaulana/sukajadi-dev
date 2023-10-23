<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    public function posyandu()
    {
        return view('page.publik.posyandu');
    }

}
