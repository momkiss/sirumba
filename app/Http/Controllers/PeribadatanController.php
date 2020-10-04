<?php

namespace App\Http\Controllers;

use App\Peribadatan;
use Illuminate\Http\Request;

class PeribadatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peribadatan  $peribadatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $jeniskonstruksi   = \App\MasterJenisKonstruksi::get();
         $jenisbangunan     = \App\MasterJenisBangunan::get();
         return view('admin.common.sarana', compact('id','jeniskonstruksi','jenisbangunan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peribadatan  $peribadatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Peribadatan $peribadatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peribadatan  $peribadatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peribadatan $peribadatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peribadatan  $peribadatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peribadatan $peribadatan)
    {
        //
    }
}
