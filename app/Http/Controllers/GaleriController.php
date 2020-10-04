<?php

namespace App\Http\Controllers;

use App\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galeri.index')->with('galeri', Galeri::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link       = $request->file('link');
        $nama_link  = uniqid().$link->getClientOriginalName();

        $link->move('uploads/galeri', $nama_link);
        Galeri::create([

            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'link' => '/uploads/galeri/'.$nama_link,
        ]);

        return redirect()->route('galeri.index')
                        ->with('success','Foto berhasil ditambahkan ke galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit')->with('galeri', $galeri);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {

        if (empty($request->file('link'))){

            $galeri->nama = $request->nama;
            $galeri->keterangan = $request->keterangan;

        }else{

            $file = public_path().'/'.$galeri->link;
            if(file_exists($file)){
                @unlink($file);
            }

            $link       = $request->file('link');
            $nama_link  = uniqid().$link->getClientOriginalName();

            $galeri->link = '/uploads/galeri/'.$nama_link;
            
            $link->move('/uploads/galeri/', $nama_link);
            $galeri->nama = $request->nama;
            $galeri->keterangan = $request->keterangan;
        }

        $galeri->save();

         return redirect()->route('galeri.index')
                          ->with('success','Foto berhasil diupdate ke galeri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        $file = public_path().'/'.$galeri->link;
        if(file_exists($file)){
            @unlink($file);
        }
         $galeri->delete();
         return redirect()->route('galeri.index')
                        ->with('success','Foto berhasil dihapus dari galeri');
    }
}
