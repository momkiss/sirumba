<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\JalanMasuk;
use Illuminate\Http\Request;

class JalanMasukController extends Controller
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
           for ($i = 0; $i < count($request->jalanmasuk_panjang); $i++) {
                $jalan_masuk[] = [
                    'user_id'       => Auth::id(),
                    'pemohon_id'    => $request->pemohon_id,
                    'panjang'       => $request->jalanmasuk_panjang[$i],
                    'kategori'      => "Jalan masuk",
                    'lebar'         => $request->jalanmasuk_lebar[$i],
                    'luas'          => $request->jalanmasuk_luas[$i],
                    'keterangan'    => $request->jalanmasuk_keterangan[$i],
                    ];
            }
            JalanMasuk::insert($jalan_masuk);
            return response()->json(['pesan'=>'Data jalan masuk berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jalanMasuk  $jalanMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(jalanMasuk $jalanMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jalanMasuk  $jalanMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(jalanMasuk $jalanMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jalanMasuk  $jalanMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(count($request->jalanmasuk_panjang) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->jalanmasuk_panjang); $i++) {
                $jalan_masuk = [
                    'user_id'       => Auth::id(),
                    'pemohon_id'    => $id,
                    'panjang'       => $request->jalanmasuk_panjang[$i],
                    'kategori'      => "Jalan masuk",
                    'lebar'         => $request->jalanmasuk_lebar[$i],
                    'luas'          => $request->jalanmasuk_luas[$i],
                    'keterangan'    => $request->jalanmasuk_keterangan[$i],
                    ];

                JalanMasuk::insert($jalan_masuk);
            }
        }


        for ($i = 0; $i < count($request->id); $i++) { 
            DB::table('jalan_masuk')->where('id', $request->id[$i])->update(
                [
                    'user_id'               => Auth::id(),
                    'pemohon_id'            => $id,
                    'panjang'               => $request->jalanmasuk_panjang[$i],
                    'lebar'                 => $request->jalanmasuk_lebar[$i],
                    'keterangan'            => $request->jalanmasuk_keterangan[$i]
                ]);
        }

        

        return response()->json([
            'pesan' => 'Jalan masuk berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jalanMasuk  $jalanMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jalan_masuk = JalanMasuk::find($id);
        $jalan_masuk->delete();

        return response()->json([
                'pesan' => 'Jalan masuk berhasil dihapus'
        ]);
    }
}
