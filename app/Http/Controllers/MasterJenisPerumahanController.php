<?php

namespace App\Http\Controllers;

use App\MasterJenisPerumahan;
use Illuminate\Http\Request;

class MasterJenisPerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisperumahan = \App\MasterJenisPerumahan::get();
        return view('admin.jenisperumahan.index', compact('jenisperumahan'));
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
  
        MasterJenisPerumahan::create($request->all());
   
        return redirect()->route('jenis-perumahan.index')
                        ->with('success','Jenis perumahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterJenisPerumahan  $masterJenisPerumahan
     * @return \Illuminate\Http\Response
     */
    public function show(MasterJenisPerumahan $masterJenisPerumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterJenisPerumahan  $masterJenisPerumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterJenisPerumahan $masterJenisPerumahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterJenisPerumahan  $masterJenisPerumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterJenisPerumahan $jenis_perumahan)
    {
        $jenis_perumahan->update($request->all());
  
        return redirect()->route('jenis-perumahan.index')
                        ->with('success','Jenis perumahan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterJenisPerumahan  $masterJenisPerumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterJenisPerumahan $jenis_perumahan)
    {
        $jenis_perumahan->delete();
        return redirect()->route('jenis-perumahan.index')
                        ->with('success','Jenis Perumahan berhasil dihapus');
    }
}
