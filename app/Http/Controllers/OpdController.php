<?php

namespace App\Http\Controllers;

use App\Opd;
use Illuminate\Http\Request;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Opd $opd)
    {
        return view('admin.opd.index')->with('opd', $opd->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.opd.tambah');
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
            'alias' => 'required',
        ]);
  
        Opd::create($request->all());
   
        return redirect()->route('opd.index')
                        ->with('success','OPD Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function show(Opd $opd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function edit(Opd $opd)
    {
        return view('admin.opd.edit',compact('opd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opd $opd)
    {
        $opd->update($request->all());
  
        return redirect()->route('opd.index')
                        ->with('success','OPD Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opd $opd)
    {
        $opd->delete();
        return redirect()->route('opd.index')
                        ->with('success','OPD Berhasil dihapus');
    }
}
