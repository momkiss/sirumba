<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Culdesac;
use Illuminate\Http\Request;

class CuldesacController extends Controller
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
            for ($i = 0; $i < count($request->culdesac_panjang); $i++) {       
                $culdesac[] = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $request->pemohon_id,
                    'panjang' => $request->culdesac_panjang[$i],
                    'kategori' => "Culdesac",
                    'lebar' => $request->culdesac_lebar[$i],
                    'luas' => $request->culdesac_luas[$i],
                    'tersedia' => $request->culdesac_tersedia[$i],
                    'keterangan' => $request->culdesac_keterangan[$i],
                    ];
            }
        Culdesac::insert($culdesac);

        return response()->json([
            'pesan' => 'Data ruang berputar (culdesac) berhasil disimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\culdesac  $culdesac
     * @return \Illuminate\Http\Response
     */
    public function show(culdesac $culdesac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\culdesac  $culdesac
     * @return \Illuminate\Http\Response
     */
    public function edit(culdesac $culdesac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\culdesac  $culdesac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(count($request->culdesac_panjang) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->culdesac_panjang); $i++) {
                $culdesac = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'panjang' => $request->culdesac_panjang[$i],
                    'kategori' => "Culdesac",
                    'lebar' => $request->culdesac_lebar[$i],
                    'luas' => $request->culdesac_luas[$i],
                    'tersedia' => $request->culdesac_tersedia[$i],
                    'keterangan' => $request->culdesac_keterangan[$i],
                    ];

                Culdesac::insert($culdesac);
            }
        }

        for ($i = 0; $i < count($request->id); $i++) { 
            DB::table('culdesac')->where('id', $request->id[$i])->update(
                [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'panjang' => $request->culdesac_panjang[$i],
                    'kategori' => "Culdesac",
                    'lebar' => $request->culdesac_lebar[$i],
                    'luas' => $request->culdesac_luas[$i],
                    'tersedia' => $request->culdesac_tersedia[$i],
                    'keterangan' => $request->culdesac_keterangan[$i],
                ]);
        }

        return response()->json([
            'pesan' => 'Ruang berputar(culdesac) berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\culdesac  $culdesac
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $culdesac = Culdesac::find($id);
        $culdesac->delete();

        return response()->json([
                'pesan' => 'Ruang berputar(culdesac) berhasil dihapus'
        ]);
    }
}
