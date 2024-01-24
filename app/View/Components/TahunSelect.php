<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class TahunSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $tahun = DB::table('j_tahun')->select('*')->orderBy('id_j_tahun', 'DESC')->get();

        return view('components.tahun-select',[
            'tahun' => $tahun
        ]);
    }
}
