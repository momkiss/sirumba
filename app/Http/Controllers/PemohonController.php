<?php

namespace App\Http\Controllers;

use App\Pemohon;
use App\Pengembang;
use App\JenisBerkas;
use App\Berkas;
use DB;
use View;
use Illuminate\Http\Request;
use Auth;
use DataTables;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $semuaberkas = "DATA PEMOHON HARUS DIISI DAHULU";
        $kecamatan  = \App\MasterKecamatan::get();
        $kelurahan  = \App\MasterKelurahan::get();
        $jeniskonstruksi  = \App\MasterJenisKonstruksi::get();
        $jenisbangunan  = \App\MasterJenisBangunan::get();
        $tipe = \App\MasterTipe::get();
        $pengembang = Pengembang::get();
        $form = "tambah";

        return view('admin.permohonan.index', compact('form','pengembang','semuaberkas','kecamatan','kelurahan','jeniskonstruksi','jenisbangunan','tipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->request->add(['user_id' => Auth::id() ]);
        //             $pemohon = Pemohon::create($request->all());
        //             return redirect()->route('pemohon.tambah', $pemohon->id)->with(['pemohon' => $pemohon]);
        try {
            DB::beginTransaction();
                    $request->request->add(['user_id' => Auth::id() ]);
                    $pemohon = Pemohon::create($request->all());
                    $berkas = JenisBerkas::get();
                    foreach($berkas as $b) 
                    {
                        $pemohon->berkas()->create(['pemohon_id' => $pemohon->id, 'jenis_berkas_id' => $b->id, 'nama' => $b->nama, 'tersedia' => 'Tidak']);
                    }
                    // $pemohon->jalanmasuk()->create(['pemohon_id' => $pemohon->id, 'user_id' => Auth::id()]);
                    // $pemohon->jalanpembagi()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->jalanpembantu()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->jalanutama()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->culdesac()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->drainase()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->limbah()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->sampah()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->peribadatan()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->rth()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->rekreasi()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->pelayananumum()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->parkir()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->peneranganjalan()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->airbersih()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->pemadamkebakaran()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->listrik()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->telepon()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->gas()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->transportasi()->create(['pemohon_id' => $pemohon->id]);
                    // $pemohon->peneranganjasaumum()->create(['pemohon_id' => $pemohon->id]);
            DB::commit();
                    return response()->json([
                        'id' => $pemohon->id,
                        'pesan' => 'Biodata pemohon berhasil disimpan. Silakan ke form selanjutnya.',
                    ]);
                // return redirect()->route('pemohon.tambah', $pemohon->id)->with(['pemohon' => $pemohon,
                //                                                                 'pesan' => 'Biodata pemohon sudah berhasil disimpan, lanjutkan pengisian berikutnya.'    
                //                                                                 ]);
            } catch (\PDOException $e) {
                // Woopsy
                DB::rollBack();
            }
                // return response()->json($pemohon);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemohon  $pemohon
     * @return \Illuminate\Http\Response
     */
    public function rekap()
    {
        $permohonan = Pemohon::query();
          if(request()->ajax()) 
          
          {
            return datatables::eloquent($permohonan)
                ->addColumn('action', function($permohonan){
                    return  view('admin.permohonan.result', ['id' => $permohonan->id]);
                })
                ->addColumn('perusahaan', function($permohonan) {
                    if($permohonan->pengembang()->exists()){ 
                        $perusahaan = $permohonan->pengembang->nama_perusahaan ?? "-";
                    }else{
                        $perusahaan = "-";
                    }

                    return '<a href="#" data-toggle="modal" data-target="#modal-detail-pemohon" data-id="'.$permohonan->id.'">'.$perusahaan.' </a>';
                })
                ->addColumn('tanggal_surat_permohonan', function($permohonan){
                    return $permohonan->tanggal_surat_permohonan->format('d-m-Y');
                })

                ->addColumn('alamat', function($permohonan){
                    return  $permohonan->alamat_jalan_perumahan.' - '.$permohonan->kelurahan_perumahan->nama ?? "".' - '.$permohonan->kecamatan_perumahan->nama ?? "";
                })
                ->addColumn('status', function($permohonan){
                    $status = '';
                    if ($permohonan->status == 0){
                        $status = '<span class="label label-primary">Penginputan</span>';
                    }
                    if ($permohonan->status == 1)
                    {
                                  $status = '<span class="label label-warning">Verifikasi</span>';
                    }
                    if ($permohonan->status == 2)
                    {
                                $status = '<span class="label label-success">Disetujui</span>';
                        }
                    if ($permohonan->status == 3)
                    {
                                   $status = ' <span class="label label-danger">Ditolak</span>';
                    }     
                    return $status; 
                })
                ->rawColumns(['action','perusahaan','status'])
                ->addIndexColumn()
                 ->toJson();
                
            }
        // $pemohon = Pemohon::get();
        // return view('admin.permohonan.rekap', compact('pemohon'));
        return view('admin.permohonan.rekap');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemohon  $pemohon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_permohonan      = $id;
        $pemohon            = Pemohon::find($id);
        $kecamatan          = \App\MasterKecamatan::get();
        $kelurahan          = \App\MasterKelurahan::get();
        $jeniskonstruksi    = \App\MasterJenisKonstruksi::get();
        $jenisbangunan      = \App\MasterJenisBangunan::get();
        $berkas             = \App\Berkas::where('pemohon_id', $id)->get();
        $pengembang         = Pengembang::get();
        $tipe               = \App\MasterTipe::get();
        $form               = "edit";

      
        
        return view('admin.permohonan.index', compact('form','id_permohonan','pengembang','berkas', 'tipe' ,'kecamatan','kelurahan','jeniskonstruksi','jenisbangunan','pemohon'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemohon  $pemohon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemohon = Pemohon::findOrFail($id);
        $input = $request->all();
        $pemohon->fill($input)->save();
        
        return response()->json([
            'pesan' => 'Data pemohon berhasil diupdate.',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemohon  $pemohon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemohon $permohonan)
    {
         $permohonan->delete();
         return redirect()->route('permohonan.rekap')
                        ->with('success','Pemohonan berhasil dihapus');
    }


    public function prasarana(Request $request)
    {
        dd($request->all());
    }

    public function simpanSarana(Request $request)
    {

    DB::transaction(function()  use ($request) {

           DB::table('rth')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->rth_jenis_konstruksi,
                    'ukuran'                        => $request->rth_ukuran,
                    'luas_lahan'                    => $request->rth_luas_lahan,
                    'jenis'                         => $request->rth_jenis,
                    'keterangan'                    => $request->rth_keterangan
                ]);

            DB::table('peribadatan')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->ibadah_jenis_konstruksi,
                    'ukuran'                        => $request->ibadah_ukuran,
                    'luas_lahan'                    => $request->ibadah_luas_lahan,
                    'jenis'                         => $request->ibadah_jenis,
                    'keterangan'                    => $request->ibadah_keterangan
                ]);


            DB::table('rekreasi')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->rekreasi_jenis_konstruksi,
                    'ukuran'                        => $request->rekreasi_ukuran,
                    'luas_lahan'                    => $request->rekreasi_luas_lahan,
                    'jenis'                         => $request->rekreasi_jenis,
                    'keterangan'                    => $request->rekreasi_keterangan
                ]);

            DB::table('sarana_pendidikan')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->pendidikan_jenis_konstruksi,
                    'ukuran'                        => $request->pendidikan_ukuran,
                    'luas_lahan'                    => $request->pendidikan_luas_lahan,
                    'jenis'                         => $request->pendidikan_jenis,
                    'keterangan'                    => $request->pendidikan_keterangan
                ]);

            DB::table('sarana_kesehatan')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->kesehatan_jenis_konstruksi,
                    'luas_lahan'                    => $request->kesehatan_luas_lahan,
                    'ukuran'                        => $request->kesehatan_ukuran,
                    'jenis'                         => $request->kesehatan_jenis,
                    'keterangan'                    => $request->kesehatan_keterangan
                ]);

            DB::table('sarana_perniagaan')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->perniagaan_jenis_konstruksi,
                    'luas_lahan'                    => $request->perniagaan_luas_lahan,
                    'ukuran'                        => $request->perniagaan_ukuran,
                    'jenis'                         => $request->perniagaan_jenis,
                    'keterangan'                    => $request->perniagaan_keterangan
                ]);

            DB::table('pelayanan_umum')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->umum_jenis_konstruksi,
                    'luas_lahan'                    => $request->umum_luas_lahan,
                    'ukuran'                        => $request->umum_ukuran,
                    'jenis'                         => $request->umum_jenis,
                    'keterangan'                    => $request->umum_keterangan
                ]);

            DB::table('parkir')->insert(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->parkir_jenis_konstruksi,
                    'luas_lahan'                    => $request->parkir_luas_lahan,
                    'ukuran'                        => $request->parkir_ukuran,
                    'jenis'                         => $request->parkir_jenis,
                    'keterangan'                    => $request->parkir_keterangan
                ]);

        
    });

        return response()->json([
                'pesan' => 'Data sarana berhasil disimpan.',
        ]);
    }

    public function updateSarana(Request $request, $id)
    {
        
    DB::transaction(function()  use ($request) {

            DB::table('rth')->where('id', $request->id_rth)->update(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->rth_jenis_konstruksi,
                    'ukuran'                        => $request->rth_ukuran,
                    'luas_lahan'                    => $request->rth_luas_lahan,
                    'jenis'                         => $request->rth_jenis,
                    'keterangan'                    => $request->rth_keterangan
                ]);

            DB::table('peribadatan')->where('id', $request->id_peribadatan)->update(
                [
                     'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->ibadah_jenis_konstruksi,
                    'ukuran'                        => $request->ibadah_ukuran,
                    'luas_lahan'                    => $request->ibadah_luas_lahan,
                    'jenis'                         => $request->ibadah_jenis,
                    'keterangan'                    => $request->ibadah_keterangan
                ]);

        

            DB::table('rekreasi')->where('id', $request->id_rekreasi)->update(
                [
                   'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->rekreasi_jenis_konstruksi,
                    'ukuran'                        => $request->rekreasi_ukuran,
                    'luas_lahan'                    => $request->rekreasi_luas_lahan,
                    'jenis'                         => $request->rekreasi_jenis,
                    'keterangan'                    => $request->rekreasi_keterangan
                ]);



             DB::table('sarana_pendidikan')->where('id', $request->id_sarana_pendidikan)->update(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->pendidikan_jenis_konstruksi,
                    'ukuran'                        => $request->pendidikan_ukuran,
                    'luas_lahan'                    => $request->pendidikan_luas_lahan,
                    'jenis'                         => $request->pendidikan_jenis,
                    'keterangan'                    => $request->pendidikan_keterangan
                ]);

            DB::table('sarana_kesehatan')->where('id', $request->id_sarana_kesehatan)->update(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->kesehatan_jenis_konstruksi,
                    'luas_lahan'                    => $request->kesehatan_luas_lahan,
                    'ukuran'                        => $request->kesehatan_ukuran,
                    'jenis'                         => $request->kesehatan_jenis,
                    'keterangan'                    => $request->kesehatan_keterangan
                ]);

            DB::table('sarana_perniagaan')->where('id', $request->id_sarana_perniagaan)->update(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->perniagaan_jenis_konstruksi,
                    'luas_lahan'                    => $request->perniagaan_luas_lahan,
                    'ukuran'                        => $request->perniagaan_ukuran,
                    'jenis'                         => $request->perniagaan_jenis,
                    'keterangan'                    => $request->perniagaan_keterangan
                ]);


            DB::table('pelayanan_umum')->where('id', $request->id_pelayanan_umum)->update(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->umum_jenis_konstruksi,
                    'luas_lahan'                    => $request->umum_luas_lahan,
                    'ukuran'                        => $request->umum_ukuran,
                    'jenis'                         => $request->umum_jenis,
                    'keterangan'                    => $request->umum_keterangan
                ]);

            DB::table('parkir')->where('id', $request->id_parkir)->update(
                [
                    'user_id'                       => Auth::id(),
                    'pemohon_id'                    => $request->pemohon_id,
                    'kategori'                      => 'sarana',
                    'jenis_konstruksi'              => $request->parkir_jenis_konstruksi,
                    'luas_lahan'                    => $request->parkir_luas_lahan,
                    'ukuran'                        => $request->parkir_ukuran,
                    'jenis'                         => $request->parkir_jenis,
                    'keterangan'                    => $request->parkir_keterangan
                ]);

        
    });

        return response()->json([
                'pesan' => 'Data sarana berhasil diupdate.',
        ]);
    }




    public function status($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        $permohonan->status = 1;
        $permohonan->save();

        return response()->json([
            'pesan' => "Pengisian data selesai."
        ]);

        return redirect()->route('permohonan.rekap');
    }


    public function statusVerifikasi($id,$status)
    {
        $permohonan = Pemohon::findOrFail($id);
        $permohonan->status = $status;
        $permohonan->save();

        return response()->json([
            'pesan' => 'Verifikasi selesai'
        ]);
    }

    public function detail_pemohon($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        return View::make('admin.detail.pemohon', ['permohonan' => $permohonan]);
        // return view('admin.detail.pemohon', compact('permohonan'));
    }

    public function detail_prasarana($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        return View::make('admin.detail.prasarana', ['permohonan' => $permohonan]);
    }

    public function detail_sarana($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        return View::make('admin.detail.sarana', ['permohonan' => $permohonan]);
    }

    public function detail_utilitas($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        return View::make('admin.detail.utilitas', ['permohonan' => $permohonan]);
    }

    public function detail_ukuran($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        return View::make('admin.detail.ukuran', ['permohonan' => $permohonan]);
    }

    public function getPengembang($id)
    {
        $pengembang = Pengembang::where('id', $id)->first();

        if(strlen($pengembang->alamat_kecamatan) > 2)
        {
            $kecamatan = $pengembang->alamat_kecamatan_luar;
            $kelurahan = $pengembang->alamat_kelurahan_luar;
        }else{
            $kecamatan = $pengembang->kecamatan->nama ?? "";
            $kelurahan = $pengembang->kelurahan->nama ?? "";
        }


        return response()->json([
            "nama_perusahaan"   =>  $pengembang->nama_perusahaan,
            "direktur"          =>  $pengembang->direktur,
            "no_ktp"            =>  $pengembang->no_ktp,
            "kecamatan"         =>  $kecamatan,
            "kelurahan"         =>  $kelurahan,
            "jalan"             =>  $pengembang->alamat_jalan,
            "rt"                =>  $pengembang->alamat_rt,
            "telp"              =>  $pengembang->telp,
            "kode_pos"          =>  $pengembang->kode_pos,
        ]);
    }

    public function ajax()
    {
        if(request()->ajax()) {
            return datatables()->of(Pemohon::select('*'))
            ->addColumn('action', 'DataTables.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
       
    }


}
