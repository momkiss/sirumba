<?php

namespace App\Http\Controllers;

use App\MasterJenisKonstruksi;
use Illuminate\Http\Request;

class MasterJenisKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeniskonstruksi = \App\MasterJenisKonstruksi::get();
        return view('admin.jeniskonstruksi.index', compact('jeniskonstruksi'));
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
  
        MasterJenisKonstruksi::create($request->all());
   
        return redirect()->route('jenis-konstruksi.index')
                        ->with('success','Jenis konstruksi Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterJenisKonstruksi  $masterJenisKonstruksi
     * @return \Illuminate\Http\Response
     */
    public function show(MasterJenisKonstruksi $masterJenisKonstruksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterJenisKonstruksi  $masterJenisKonstruksi
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterJenisKonstruksi $masterJenisKonstruksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterJenisKonstruksi  $masterJenisKonstruksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterJenisKonstruksi $jenis_konstruksi)
    {
        $request->request->add(['user_id' => 2]);
        $jenis_konstruksi->update($request->all());
  
        return redirect()->route('jenis-konstruksi.index')
                        ->with('success','Jenis konstruksi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterJenisKonstruksi  $masterJenisKonstruksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterJenisKonstruksi $jenis_konstruksi)
    {
        $jenis_konstruksi->delete();
        return redirect()->route('jenis-konstruksi.index')
                        ->with('success','Jenis konstruksi berhasil dihapus');
    }

    public function getDataKonstruksi()
    {
        $konstruksi = \App\MasterJenisKonstruksi::get();
        return $konstruksi;
    }
}
