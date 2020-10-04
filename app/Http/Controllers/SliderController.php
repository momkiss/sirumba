<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index')->with('slider', Slider::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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

        $link->move('uploads/slider', $nama_link);

        Slider::create([
            // 'user_id' => Auth::id(),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'link' => 'uploads/slider/'.$nama_link,
            'urutan' => $request->urutan,
            'aktif' => $request->aktif,
        ]);

        return redirect()->route('slider.index')
                         ->with('success','Slider berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit')->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {

         $file = public_path().'/'.$slider->link;
            if(file_exists($file)){
                @unlink($file);
        }

        if($request->hasFile('link'))
        {
            $link       = $request->file('link');
            $nama_link  = uniqid().$link->getClientOriginalName();
            $link->move('uploads/slider', $nama_link);
            $slider->link = 'uploads/slider/'.$nama_link;
        }

        $slider->nama = $request->nama;
        $slider->deskripsi = $request->deskripsi;
        $slider->urutan = $request->urutan;
        $slider->aktif = $request->aktif;
        $slider->save();

        return redirect()->route('slider.index')
                         ->with('success','Slider berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $file = public_path().'/'.$slider->link;
        if(file_exists($file)){
            @unlink($file);
        }
        
         $slider->delete();
         return redirect()->route('slider.index')
                        ->with('success','Slider berhasil dihapus');
    }
}
