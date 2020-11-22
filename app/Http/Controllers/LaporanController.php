<?php

namespace App\Http\Controllers;

use PDF;
use App\Laporan;
use App\Pemohon;
use App\MasterKecamatan;
use App\Pengembang;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.laporan.index');
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
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

    public function pencarian(Request $request)
    {
       $from = $request->tgl_awal;
       $to = $request->tgl_akhir;
       $permohonan = Pemohon::whereBetween('tanggal_surat_permohonan', [$from, $to])->get();
 
       return view('admin.laporan.index')->with('permohonan', $permohonan)
                                         ->with('tanggal_awal', $from)
                                         ->with('tanggal_akhir', $to);

    }

    public function kelengkapan($id)
    {
        $permohonan = Pemohon::findOrFail($id);

        $pdf = PDF::loadView('admin.laporan.kelengkapan', compact('permohonan'));
        $file = time().'_'.date('Y-m-d').'.pdf';
	    return $pdf->stream($file);
    }

    public function permohonan($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        $pdf = PDF::loadView('admin.laporan.permohonan', compact('permohonan'));
        $file = time().'_'.date('Y-m-d').'.pdf';
	    return $pdf->stream($file);
    }

    public function perkecamatan(){
        $kecamatan = MasterKecamatan::orderBy('nama')->get();
        return view('admin.laporan.perkecamatan',compact('kecamatan'));
    }

    public function perkecamatanTampil(Request $request){

        $kec = $request->kecamatan;
        $kecamatan = MasterKecamatan::orderBy('nama')->get();
        $permohonan = Pemohon::where('alamat_kecamatan_perumahan', $kec)->get();
    
        return view('admin.laporan.perkecamatan',compact('permohonan','kecamatan','kec'));
    }

    
    public function perpengembang(){
        $pengembang = Pengembang::orderBy('nama_perusahaan')->get();
        return view('admin.laporan.perpengembang',compact('pengembang'));
    }

    public function perpengembangTampil(Request $request){

        $reqPengembang = $request->pengembang;
        $pengembang = Pengembang::orderBy('nama_perusahaan')->get();
        $permohonan = Pemohon::where('pengembang_id', $reqPengembang)->get();

        $judul = Pengembang::select('nama_perusahaan')->where('id', $reqPengembang)->first()->nama_perusahaan;
    
        return view('admin.laporan.perpengembang',compact('permohonan','pengembang','judul','reqPengembang'));
    }
}
