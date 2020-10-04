<?php

namespace App\Http\Controllers;

use App\MasterTipe;
use Illuminate\Http\Request;

class MasterTipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiperumah = MasterTipe::get();
        return view('admin.tiperumah.index', compact('tiperumah'));
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
  
        MasterTipe::create($request->all());
   
        return redirect()->route('tipe-rumah.index')
                        ->with('success','Tipe rumah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\masterTipe  $masterTipe
     * @return \Illuminate\Http\Response
     */
    public function show(masterTipe $masterTipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\masterTipe  $masterTipe
     * @return \Illuminate\Http\Response
     */
    public function edit(masterTipe $masterTipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\masterTipe  $masterTipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masterTipe $tipe_rumah)
    {
        $tipe_rumah->update($request->all());
  
        return redirect()->route('tipe-rumah.index')
                        ->with('success','Tipe rumah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\masterTipe  $masterTipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(masterTipe $tipe_rumah)
    {
        $tipe_rumah->delete();
        return redirect()->route('tipe-rumah.index')
                        ->with('success','Tipe rumah berhasil dihapus');
    }
}
