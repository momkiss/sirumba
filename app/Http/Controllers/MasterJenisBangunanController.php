<?php

namespace App\Http\Controllers;

use App\MasterJenisBangunan;
use Illuminate\Http\Request;

class MasterJenisBangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisbangunan = \App\MasterJenisBangunan::get();
        return view('admin.jenisbangunan.index', compact('jenisbangunan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'nama' => 'required',
        ]);
  
        MasterJenisBangunan::create($request->all());
   
        return redirect()->route('jenis-bangunan.index')
                        ->with('success','Jenis bangunan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterJenisBangunan  $masterJenisBangunan
     * @return \Illuminate\Http\Response
     */
    public function show(MasterJenisBangunan $masterJenisBangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterJenisBangunan  $masterJenisBangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterJenisBangunan $masterJenisBangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterJenisBangunan  $masterJenisBangunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterJenisBangunan $jenis_bangunan)
    {
        $jenis_bangunan->update($request->all());
  
        return redirect()->route('jenis-bangunan.index')
                        ->with('success','Jenis bangunan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterJenisBangunan  $masterJenisBangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterJenisBangunan $jenis_bangunan)
    {
        $jenis_bangunan->delete();
        return redirect()->route('jenis-bangunan.index')
                        ->with('success','Jenis bangunan berhasil dihapus');
    }
}
