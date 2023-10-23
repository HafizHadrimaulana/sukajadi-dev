<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function kegiatan()
    {
        return view('page.publik.kegiatan');
    }
}
