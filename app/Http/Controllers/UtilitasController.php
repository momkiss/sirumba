<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use DB;
use View;
use App\Utilitas;
use Illuminate\Http\Request;

class UtilitasController extends Controller
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
    DB::transaction(function()  use ($request) {
            DB::table('penerangan_jalan')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->penerangan_jalan,
                    'keterangan'        => $request->penerangan_jalan_keterangan
                ]);

            DB::table('air_bersih')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->jaringan_air_bersih,
                    'keterangan'        => $request->jaringan_air_bersih_keterangan
                ]);

            DB::table('pemadam_kebakaran')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->pemadam_kebakaran,
                    'keterangan'        => $request->pemadam_kebakaran_keterangan
                ]);

            DB::table('listrik')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->jaringan_listrik,
                    'keterangan'        => $request->jaringan_listrik_keterangan
                ]);

            DB::table('telepon')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->jaringan_telepon,
                    'keterangan'        => $request->jaringan_telepon_keterangan
                ]);

            DB::table('gas')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->jaringan_gas,
                    'keterangan'        => $request->jaringan_gas_keterangan
                ]);

            DB::table('transportasi')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->jaringan_transportasi,
                    'keterangan'        => $request->jaringan_transportasi_keterangan
                ]);

    

            DB::table('utilitas_gorong_gorong')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->gorong_gorong,
                    'keterangan'        => $request->gorong_gorong_keterangan
                ]);

            DB::table('drainase')->insert(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'Utilitas',
                    'tersedia'          => $request->drainase,
                    'keterangan'        => $request->drainase_keterangan
                ]);

        
    });

        return response()->json([
                'pesan' => 'Data utilitas berhasil disimpan.',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Utilitas  $utilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Utilitas $utilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Utilitas  $utilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilitas $utilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Utilitas  $utilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            DB::transaction(function()  use ($request) {
            DB::table('penerangan_jalan')->where('id', $request->id_penerangan_jalan)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->penerangan_jalan,
                    'keterangan'        => $request->penerangan_jalan_keterangan
                ]);

            DB::table('air_bersih')->where('id', $request->id_air_bersih)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->jaringan_air_bersih,
                    'keterangan'        => $request->jaringan_air_bersih_keterangan
                ]);

            DB::table('pemadam_kebakaran')->where('id', $request->id_pemadam_kebakaran)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->pemadam_kebakaran,
                    'keterangan'        => $request->pemadam_kebakaran_keterangan
                ]);

            DB::table('listrik')->where('id', $request->id_jaringan_listrik)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->jaringan_listrik,
                    'keterangan'        => $request->jaringan_listrik_keterangan
                ]);

            DB::table('telepon')->where('id', $request->id_jaringan_telepon)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->jaringan_telepon,
                    'keterangan'        => $request->jaringan_telepon_keterangan
                ]);

            DB::table('gas')->where('id', $request->id_jaringan_gas)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->jaringan_gas,
                    'keterangan'        => $request->jaringan_gas_keterangan
                ]);

            DB::table('transportasi')->where('id', $request->id_jaringan_transportasi)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->jaringan_transportasi,
                    'keterangan'        => $request->jaringan_transportasi_keterangan
                ]);

           DB::table('gorong_gorong')->where('id', $request->id_gorong_gorong)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->gorong_gorong,
                    'keterangan'        => $request->gorong_gorong_keterangan
                ]);

            DB::table('drainase')->where('id', $request->id_drainase)->update(
                [
                    'user_id'           => Auth::id(),
                    'pemohon_id'        => $request->pemohon_id,
                    'kategori'          => 'utilitas',
                    'tersedia'          => $request->drainase,
                    'keterangan'        => $request->drainase_keterangan
                ]);

        
    });

        return response()->json([
            'pesan' => 'Data utilitas berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Utilitas  $utilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilitas $utilitas)
    {
        //
    }

    public function detail($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        return View::make('admin.detail.utilitas', ['permohonan' => $permohonan]);
    }
}
