<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\JalanUtama;
use Illuminate\Http\Request;

class JalanUtamaController extends Controller
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
        // dd(count($request->jalanutama_panjang));
          for ($i = 0; $i < count($request->jalanutama_panjang); $i++) {
                $num = $i+1;
                $jalan_utama[] = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $request->pemohon_id,
                    'jenis_konstruksi' => $request->jalanutama_jenis_konstruksi[$i],
                    'panjang' => $request->jalanutama_panjang[$i],
                    'kategori' => "Jalan utama",
                    'lebar' => $request->jalanutama_lebar[$i],
                    'luas' => $request->jalanutama_luas[$i],
                    'median' => $request->jalanutama_median[$i][$num],
                    'ukuran' => $request->jalanutama_ukuran[$i],
                    'tersedia' => $request->jalanutama_tersedia[$i],
                    'keterangan' => $request->jalanutama_keterangan[$i],
                    ];
            }
            JalanUtama::insert($jalan_utama);
            return response()->json(['pesan'=>'Data jalan utama berhasil disimpan.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jalanUtama  $jalanUtama
     * @return \Illuminate\Http\Response
     */
    public function show(jalanUtama $jalanUtama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jalanUtama  $jalanUtama
     * @return \Illuminate\Http\Response
     */
    public function edit(jalanUtama $jalanUtama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jalanUtama  $jalanUtama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(count($request->jalanutama_panjang) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->jalanutama_panjang); $i++) {
                $num = $i+1;
                $jalan_utama = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'jenis_konstruksi' => $request->jalanutama_jenis_konstruksi[$i],
                    'panjang' => $request->jalanutama_panjang[$i],
                    'kategori' => "Jalan utama",
                    'lebar' => $request->jalanutama_lebar[$i],
                    'luas' => $request->jalanutama_luas[$i],
                    'median' => $request->jalanutama_median[$i][$num],
                    'ukuran' => $request->jalanutama_ukuran[$i],
                    'tersedia' => $request->jalanutama_tersedia[$i],
                    'keterangan' => $request->jalanutama_keterangan[$i],
                    ];

                JalanUtama::insert($jalan_utama);
            }
        }

          for ($i = 0; $i < count($request->id); $i++) { 
              $num = $i+1;
            DB::table('jalan_utama')->where('id', $request->id[$i])->update(
                [
                    'user_id'               => Auth::id(),
                    'pemohon_id'             => $id,
                    'jenis_konstruksi'      => $request->jalanutama_jenis_konstruksi[$i],
                    'panjang'               => $request->jalanutama_panjang[$i],
                    'kategori'              => "Jalan utama",
                    'lebar'                 => $request->jalanutama_lebar[$i],
                    'luas'                  => $request->jalanutama_luas[$i],
                    'median'                => $request->jalanutama_median[$i][$num],
                    'ukuran'                => $request->jalanutama_ukuran[$i],
                    'tersedia'              => $request->jalanutama_tersedia[$i],
                    'keterangan'            => $request->jalanutama_keterangan[$i],
                ]);
        }

        return response()->json([
            'pesan' => 'Jalan utama berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jalanUtama  $jalanUtama
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jalan_utama = JalanUtama::find($id);
        $jalan_utama->delete();

        return response()->json([
                'pesan' => 'Jalan utama berhasil dihapus'
        ]);
    }
}
