<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class SOPDSelect extends Component
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
        $data = DB::table('j_sopd')->select('*')->orderBy('id_j_sopd', 'ASC')->get();

        return view('components.sopd-select',[
            'data' => $data
        ]);
    }
}
