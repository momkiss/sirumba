<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Limbah;
use Illuminate\Http\Request;

class LimbahController extends Controller
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
        for ($i = 0; $i < count($request->limbah_panjang); $i++) {    
                $limbah[] = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $request->pemohon_id,
                    'jenis_konstruksi' => $request->limbah_jenis_konstruksi[$i],
                    'panjang' => $request->limbah_panjang[$i],
                    'kategori' => "Limbah",
                    'lebar' => $request->limbah_lebar[$i],
                    'luas' => $request->limbah_luas[$i],
                    'tersedia' => $request->limbah_tersedia[$i],
                    'keterangan' => $request->limbah_keterangan[$i],
                    ];
            }
        Limbah::insert($limbah);

        return response()->json([
                'id' => $request->pemohon_id,
                'pesan' => 'Data limbah berhasil disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\limbah  $limbah
     * @return \Illuminate\Http\Response
     */
    public function show(limbah $limbah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\limbah  $limbah
     * @return \Illuminate\Http\Response
     */
    public function edit(limbah $limbah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\limbah  $limbah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(count($request->limbah_panjang) > count($request->id)) {
            for ($i = count($request->id) ; $i < count($request->limbah_panjang); $i++) {
                $limbah = [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'jenis_konstruksi' => $request->limbah_jenis_konstruksi[$i],
                    'panjang' => $request->limbah_panjang[$i],
                    'kategori' => "Limbah",
                    'lebar' => $request->limbah_lebar[$i],
                    'luas' => $request->limbah_luas[$i],
                    'tersedia' => $request->limbah_tersedia[$i],
                    'keterangan' => $request->limbah_keterangan[$i],
                    ];

                Limbah::insert($limbah);
            }
        }

        for ($i = 0; $i < count($request->id); $i++) { 
            DB::table('limbah')->where('id', $request->id[$i])->update(
                [
                    'user_id'   => Auth::id(),
                    'pemohon_id' => $id,
                    'jenis_konstruksi' => $request->limbah_jenis_konstruksi[$i],
                    'panjang' => $request->limbah_panjang[$i],
                    'kategori' => "Limbah",
                    'lebar' => $request->limbah_lebar[$i],
                    'luas' => $request->limbah_luas[$i],
                    'tersedia' => $request->limbah_tersedia[$i],
                    'keterangan' => $request->limbah_keterangan[$i],
                ]);
        }

        return response()->json([
            'pesan' => 'Saluran pembuangan limbah berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\limbah  $limbah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $limbah = Limbah::find($id);
        $limbah->delete();

        return response()->json([
                'pesan' => 'Saluran pembuangan limbah berhasil dihapus'
        ]);
    }
}
