<?php

namespace App\Http\Controllers;
use App\Models\Gis;
use Illuminate\Http\Request;

class DataBerandaController extends Controller
{
    public function data()
    {
        $map=Gis::all();
        return view('page.publik.data', [
            'map'=>$map,
        ]);
    }
}
