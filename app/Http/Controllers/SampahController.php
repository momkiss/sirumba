<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
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
        // dd($request->all);
        for ($i = 0; $i < count($request->sampah_ukuran); $i++) {       
                $num = $i+1;
                $sampah[] = [
                    'user_id'             => Auth::id(),
                    'pemohon_id'          => $request->pemohon_id,
                    'jenis_konstruksi'    => $request->sampah_jenis_konstruksi[$i],
                    'panjang'             => $request->sampah_panjang[$i],
                    'kategori'            => "Sampah",
                    // 'lebar'               => $request->sampah_lebar[$i],
                    // 'tinggi'              => $request->sampah_tinggi[$i],
                    'jenis_tps'              => $request->sampah_jenis_tps[$i],
                    'volume'              => $request->sampah_ukuran[$i],
                    'keterangan'          => $request->sampah_keterangan[$i],
                    'tersedia'            => $request->sampah_tersedia[$i],
                    'terpilah'            => $request->sampah_terpilah[$i][$num],
                    'jarak_rumah_terdekat'=> $request->sampah_jarak[$i],
                    ];
            }
        Sampah::insert($sampah);

        return response()->json([
            'pesan' => 'Data sampah berhasil disimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sampah  $sampah
     * @return \Illuminate\Http\Response
     */
    public function show(Sampah $sampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sampah  $sampah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sampah $sampah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sampah  $sampah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(count($request->sampah_ukuran) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->sampah_panjang); $i++) {
                $num = $i+1;
                $sampah = [
                    'user_id'             => Auth::id(),
                    'pemohon_id'          => $id,
                    'jenis_konstruksi' => $request->sampah_jenis_konstruksi[$i],
                    'panjang'             => $request->sampah_panjang[$i],
                    'kategori'            => "Sampah",
                    // 'lebar'               => $request->sampah_lebar[$i],
                    // 'tinggi'              => $request->sampah_tinggi[$i],
                    'jenis_tps'              => $request->sampah_jenis_tps[$i],
                    'volume'              => $request->sampah_ukuran[$i],
                    'keterangan'          => $request->sampah_keterangan[$i],
                    'tersedia'            => $request->sampah_tersedia[$i],
                    'terpilah'            => $request->sampah_terpilah[$i][$num],
                    'jarak_rumah_terdekat'=> $request->sampah_jarak[$i],
                    ];

                Sampah::insert($sampah);
            }
        }

        for ($i = 0; $i < count($request->id); $i++) { 

            $num = $i+1;
            DB::table('sampah')->where('id', $request->id[$i])->update(
                [
                    'user_id'             => Auth::id(),
                    'pemohon_id'          => $id,
                    'jenis_konstruksi'    => $request->sampah_jenis_konstruksi[$i],
                    'panjang'             => $request->sampah_panjang[$i],
                    'kategori'            => "Sampah",
                    // 'lebar'               => $request->sampah_lebar[$i],
                    // 'tinggi'              => $request->sampah_tinggi[$i],
                    'jenis_tps'              => $request->sampah_jenis_tps[$i],
                    'volume'              => $request->sampah_ukuran[$i],
                    'keterangan'          => $request->sampah_keterangan[$i],
                    'tersedia'            => $request->sampah_tersedia[$i],
                    'terpilah'            => $request->sampah_terpilah[$i][$num],
                    'jarak_rumah_terdekat'=> $request->sampah_jarak[$i],
                ]);
        }

        return response()->json([
            'pesan' => 'Tempat pembuangan sampah berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sampah  $sampah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sampah = Sampah::find($id);
        $sampah->delete();

        return response()->json([
                'pesan' => 'Tempat pembuangan sampah berhasil dihapus'
        ]);
    }
}
