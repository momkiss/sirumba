<?php

namespace App\Http\Controllers;

use App\MasterKecamatan;
use App\MasterKelurahan;
use Illuminate\Http\Request;

class MasterKecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = \App\MasterKecamatan::get();
        return view('admin.kecamatan.index', compact('kecamatan'));
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
  
        MasterKecamatan::create($request->all());
   
        return redirect()->route('kecamatan.index')
                        ->with('success','Kecamatan Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterKecamatan  $masterKecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(MasterKecamatan $masterKecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterKecamatan  $masterKecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterKecamatan $masterKecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterKecamatan  $masterKecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterKecamatan $kecamatan)
    {
        $kecamatan->update($request->all());
  
        return redirect()->route('kecamatan.index')
                        ->with('success','Kecamatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterKecamatan  $masterKecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterKecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')
                        ->with('success','Kecamatan berhasil dihapus');
    }

     public function getKelurahan($kode)
    {
        $kelurahan = MasterKelurahan::orderBy('nama')->where('master_kecamatan_id', $kode)->get();
        return response()->json($kelurahan);
    }
}
