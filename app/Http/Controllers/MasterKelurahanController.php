<?php

namespace App\Http\Controllers;

use App\MasterKelurahan;
use App\MasterKecamatan;
use Illuminate\Http\Request;

class MasterKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = \App\MasterKelurahan::get();
        $kecamatan = \App\MasterKecamatan::get();
        return view('admin.kelurahan.index', compact('kelurahan','kecamatan'));
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
  
        MasterKelurahan::create($request->all());
   
        return redirect()->route('kelurahan.index')
                        ->with('success','Kelurahan Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterKelurahan  $masterKelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(MasterKelurahan $masterKelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterKelurahan  $masterKelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterKelurahan $masterKelurahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterKelurahan  $masterKelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterKelurahan $kelurahan)
    {
        $kelurahan->update($request->all());
  
        return redirect()->route('kelurahan.index')
                        ->with('success','Kelurahan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterKelurahan  $masterKelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterKelurahan $kelurahan)
    {
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')
                        ->with('success','Kelurahan berhasil dihapus');
    }
}
