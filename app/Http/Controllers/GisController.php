<?php

namespace App\Http\Controllers;
use App\Models\Gis;
use Illuminate\Http\Request;

class GisController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Gis::all();
        return view("page.admin.data.sarpras.index",[
            'data'=>$data
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("page.admin.data.sarpras.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gis::create([
            'nama'=>$request->nama,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ]);
        return redirect('/dashboard/admin/sarpras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Gis::where('id', $id)->first();
        
        return view('page.admin.data.sarpras.update', [
            'data'=>$data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gis::where('id', $id)->update([
            'nama'=>$request->nama,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            
        ]);
        return redirect('dashboard/admin/sarpras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gis::destroy($id);
        return redirect('dashboard/admin/sarpras');
    }
}
