<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\JalanPembagi;
use Illuminate\Http\Request;

class JalanPembagiController extends Controller
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
           for ($i = 0; $i < count($request->jalanpembagi_panjang); $i++) {       
                $jalan_pembagi[] = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $request->pemohon_id,
                    'panjang' => $request->jalanpembagi_panjang[$i],
                    'kategori' => "Jalan pembagi",
                    'lebar' => $request->jalanpembagi_lebar[$i],
                    'luas' => $request->jalanpembagi_luas[$i],
                    'tersedia' => $request->jalanpembagi_tersedia[$i],
                    'keterangan' => $request->jalanpembagi_keterangan[$i],
                    ];
            }
        JalanPembagi::insert($jalan_pembagi);
        return response()->json(['pesan'=>'Data jalan pembagi berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jalanPembagi  $jalanPembagi
     * @return \Illuminate\Http\Response
     */
    public function show(jalanPembagi $jalanPembagi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jalanPembagi  $jalanPembagi
     * @return \Illuminate\Http\Response
     */
    public function edit(jalanPembagi $jalanPembagi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jalanPembagi  $jalanPembagi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if(count($request->jalanpembagi_panjang) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->jalanpembagi_panjang); $i++) {
                $jalan_pembagi = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'panjang' => $request->jalanpembagi_panjang[$i],
                    'kategori' => "Jalan pembagi",
                    'lebar' => $request->jalanpembagi_lebar[$i],
                    'luas' => $request->jalanpembagi_luas[$i],
                    'tersedia' => $request->jalanpembagi_tersedia[$i],
                    'keterangan' => $request->jalanpembagi_keterangan[$i],
                    ];

                JalanPembagi::insert($jalan_pembagi);
            }
        }

        for ($i = 0; $i < count($request->id); $i++) { 
            DB::table('jalan_pembagi')->where('id', $request->id[$i])->update(
                [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'panjang' => $request->jalanpembagi_panjang[$i],
                    'lebar' => $request->jalanpembagi_lebar[$i],
                    'luas' => $request->jalanpembagi_luas[$i],
                    'tersedia' => $request->jalanpembagi_tersedia[$i],
                    'keterangan' => $request->jalanpembagi_keterangan[$i],
                ]);
        }

        return response()->json([
            'pesan' => 'Jalan pembagi berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jalanPembagi  $jalanPembagi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jalan_pembagi = JalanPembagi::find($id);
        $jalan_pembagi->delete();

        return response()->json([
                'pesan' => 'Jalan pembagi berhasil dihapus'
        ]);
    }
}
