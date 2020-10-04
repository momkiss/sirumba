<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Drainase;
use Illuminate\Http\Request;

class DrainaseController extends Controller
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
        for ($i = 0; $i < count($request->drainase_panjang); $i++) {       
                $drainase[] = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $request->pemohon_id,
                    'jenis_konstruksi' => $request->drainase_jenis_konstruksi[$i],
                    'panjang' => $request->drainase_panjang[$i],
                    'kategori' => "Drainase",
                    'lebar' => $request->drainase_lebar[$i],
                    'luas' => $request->drainase_luas[$i],
                    'tersedia' => $request->drainase_tersedia[$i],
                    'keterangan' => $request->drainase_keterangan[$i],
                    ];
            }
        Drainase::insert($drainase);

        return response()->json(['pesan'=>'Data drainase berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function show(drainase $drainase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function edit(drainase $drainase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(count($request->drainase_panjang) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->drainase_panjang); $i++) {
                $drainase = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'jenis_konstruksi' => $request->drainase_jenis_konstruksi[$i],
                    'panjang' => $request->drainase_panjang[$i],
                    'kategori' => "Drainase",
                    'lebar' => $request->drainase_lebar[$i],
                    'luas' => $request->drainase_luas[$i],
                    'tersedia' => $request->drainase_tersedia[$i],
                    'keterangan' => $request->drainase_keterangan[$i],
                    ];

                Drainase::insert($drainase);
            }
        }

        for ($i = 0; $i < count($request->id); $i++) { 
            DB::table('drainase')->where('id', $request->id[$i])->update(
                [
                   'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'jenis_konstruksi' => $request->drainase_jenis_konstruksi[$i],
                    'panjang' => $request->drainase_panjang[$i],
                    'kategori' => "Drainase",
                    'lebar' => $request->drainase_lebar[$i],
                    'luas' => $request->drainase_luas[$i],
                    'tersedia' => $request->drainase_tersedia[$i],
                    'keterangan' => $request->drainase_keterangan[$i],
                ]);
        }

        return response()->json([
            'pesan' => 'Drainase berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drainase = Drainase::find($id);
        $drainase->delete();

        return response()->json([
                'pesan' => 'Saluran pembuangan air hujan (drainase) berhasil dihapus'
        ]);
    }
}
