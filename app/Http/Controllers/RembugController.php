<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RembugController extends Controller
{
    public function rembugWarga()
    {
        return view('page.publik.rembug-warga');
    }
}
