<?php

namespace App\Http\Controllers;


use Auth;
use App\Pengembang;
use App\MasterKecamatan;
use App\MasterKelurahan;
use Illuminate\Http\Request;

class PengembangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembang = Pengembang::get();
        return view('admin.pengembang.index', compact('pengembang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = MasterKecamatan::get();
        $kelurahan = MasterKelurahan::get();
        return view('admin.pengembang.tambah', compact('kecamatan','kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->request->add(['user_id'=> Auth::id()]);
        Pengembang::create($request->all());

        return redirect()->route('pengembang.index')->with('pesan','Pengembang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengembang  $pengembang
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembang $pengembang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengembang  $pengembang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembang $pengembang)
    {
        $kecamatan = MasterKecamatan::get();
        $kelurahan = MasterKelurahan::get();
        return view('admin.pengembang.edit', compact('pengembang','kecamatan','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengembang  $pengembang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembang $pengembang)
    {
        $pengembang->update($request->all());
        return redirect()->route('pengembang.index')->with('pesan','Pengembang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengembang  $pengembang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembang $pengembang)
    {
         $pengembang->delete();
         return redirect()->route('pengembang.index')->with('pesan','Pengembang berhasil dihapus.');
    }
}
