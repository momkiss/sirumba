<?php

namespace App\Http\Controllers;

use Auth;
use App\JenisBerkas;
use Illuminate\Http\Request;

class JenisBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisberkas = JenisBerkas::get();
        return view('admin.jenisberkas.index', compact('jenisberkas'));
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

        $request->request->add(['user_id' => Auth::id()]);
  
        JenisBerkas::create($request->all());
   
        return redirect()->route('jenisberkas.index')
                        ->with('success','Jenis berkas Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisBerkas  $jenisBerkas
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBerkas $jenisBerkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisBerkas  $jenisBerkas
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBerkas $jenisBerkas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisBerkas  $jenisBerkas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisBerkas $jenisberka)
    {
        $request->request->add(['user_id' => Auth::id()]);
        $jenisberka->update($request->all());
  
        return redirect()->route('jenisberkas.index')
                        ->with('success','Jenis berkas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisBerkas  $jenisBerkas
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBerkas $jenisberka)
    {

        $jenisberka->delete();
        return redirect()->route('jenisberkas.index')
                        ->with('success','Jenis berkas berhasil dihapus');
    }
}
