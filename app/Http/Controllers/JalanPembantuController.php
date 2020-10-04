<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\JalanPembantu;
use Illuminate\Http\Request;

class JalanPembantuController extends Controller
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
        for ($i = 0; $i < count($request->jalanpembantu_panjang); $i++) {       
                $jalan_pembantu[] = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $request->pemohon_id,
                    'panjang' => $request->jalanpembantu_panjang[$i],
                    'kategori' => "Jalan pembantu",
                    'lebar' => $request->jalanpembantu_lebar[$i],
                    'luas' => $request->jalanpembantu_luas[$i],
                    'tersedia' => $request->jalanpembantu_tersedia[$i],
                    'keterangan' => $request->jalanpembantu_keterangan[$i],
                    ];
            }
        JalanPembantu::insert($jalan_pembantu);

        return response()->json(['pesan'=>'Data jalan pembantu berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jalanPembantu  $jalanPembantu
     * @return \Illuminate\Http\Response
     */
    public function show(jalanPembantu $jalanPembantu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jalanPembantu  $jalanPembantu
     * @return \Illuminate\Http\Response
     */
    public function edit(jalanPembantu $jalanPembantu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jalanPembantu  $jalanPembantu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(count($request->jalanpembantu_panjang) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->jalanpembantu_panjang); $i++) {
                $jalan_pembantu = [
                    'user_id'       => Auth::id(),
                    'pemohon_id'    => $id,
                    'panjang'       => $request->jalanpembantu_panjang[$i],
                    'kategori'      => "Jalan pembantu",
                    'lebar'         => $request->jalanpembantu_lebar[$i],
                    'luas'          => $request->jalanpembantu_luas[$i],
                    'tersedia'      => $request->jalanpembantu_tersedia[$i],
                    'keterangan'     => $request->jalanpembantu_keterangan[$i],
                    ];

                JalanPembantu::insert($jalan_pembantu);
            }
        }

        for ($i = 0; $i < count($request->id); $i++) { 
            DB::table('jalan_pembantu')->where('id', $request->id[$i])->update(
                [
                    'user_id'       => Auth::id(),
                    'pemohon_id'    => $id,
                    'panjang'       => $request->jalanpembantu_panjang[$i],
                    'lebar'         => $request->jalanpembantu_lebar[$i],
                    'luas'          => $request->jalanpembantu_luas[$i],
                    'tersedia'      => $request->jalanpembantu_tersedia[$i],
                    'keterangan'    => $request->jalanpembantu_keterangan[$i],
                ]);
        }

        return response()->json([
            'pesan' => 'Jalan pembantu berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jalanPembantu  $jalanPembantu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jalan_pembantu = JalanPembantu::find($id);
        $jalan_pembantu->delete();

        return response()->json([
                'pesan' => 'Jalan pembantu berhasil dihapus'
        ]);
    }
}
