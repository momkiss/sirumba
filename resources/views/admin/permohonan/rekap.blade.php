@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
<style>
.tab-pane, .tab-pane active{
    height:500px;
    overflow-y:scroll;
    width:100%;
}
table {
    background: none !important;
}
</style>
@endpush
@section('content')
<div class="page" style="display: none">{{ Route::current()->getName() }}</div>


<!-- Modal -->
<div class="modal" id="modal-detail-pemohon" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width:90%; overflow-y: initial !important">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-edit"></i> DETAIL PERMOHONAN</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body" >
        <div class="col-md-12">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-danger">
            <li class="active"><a href="#detail-tab-pemohon" data-toggle="tab"><strong>Pemohon</strong></a></li>
            <li><a href="#detail-tab-berkas" data-toggle="tab"><strong>Berkas</strong></a></li>
            <li><a href="#detail-tab-prasarana" data-toggle="tab"><strong>Prasarana</strong></a></li>
            <li><a href="#detail-tab-sarana" data-toggle="tab"><strong>Sarana</strong></a></li>
            <li><a href="#detail-tab-utilitas" data-toggle="tab"><strong>Utilitas</strong></a></li>
            <li><a href="#" id="rekap-cetak-permohonan" target="_blank"><span class="fa fa-file-pdf-o"></span> Cetak Permohonan </a></li>
            <li><a href="#" id="rekap-cetak-kelengkapan" target="_blank"><span class="fa fa-file-pdf-o"></span> Cetak Kelengkapan </a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content mb20">
            <div class="tab-pane active" id="detail-tab-pemohon">
                <div class="row"><div id="detail-isi-pemohon"></div></div>
                
            </div>
            <div class="tab-pane" id="detail-tab-berkas">
              <div class="row">
                <div id="detail-isi-berkas"></div>
            </div>
            </div>
            <div class="tab-pane" id="detail-tab-prasarana">
                <div class="row">
                    <div id="detail-isi-prasarana"></div>
                </div>
            </div>
            <div class="tab-pane" id="detail-tab-sarana">
                <div class="row">
                    <div id="detail-isi-sarana"></div>
                </div>
            </div>
            <div class="tab-pane" id="detail-tab-utilitas">
                <div class="row">
                    <div id="detail-isi-utilitas"></div>
                </div>
            </div>
          </div>
        </div><!-- col-md-6 -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal pengesahan-->
<div class="modal fade" id="modalPengesahan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> PENGESAHAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengesahan.simpan') }}" method="post" id="formPengesahan">
                    @csrf
                    <input type="hidden" id="pengesahanID" name="id">
                    <div class="form-group">
                        <label class="control-label center-block"><strong>NOMOR</strong></label>
                        <input type="text" class="form-control" placeholder="" name="nomor_surat_pengesahan">
                    </div>
                    <div class="form-group">
                        <label class="control-label center-block"><strong>TANGGAL</strong></label>
                        <input type="text" class="form-control datepicker" placeholder="mm-dd-yyyy" placeholder="" name="tanggal_pengesahan" autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" >SIMPAN</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h2 class="text-success mt0" ><i class="fa fa-edit"></i> <strong>REKAP PERMOHONAN</strong></h2>
        <p>Rekapitulasi data permohonan.</p>
        <hr>
    </div>


    <div class="panel-body">
        <div class="table-responsive">
            <table id="tabel-rekap" class="table table-striped table-hover display compact" style="width: 100%">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>PENGEMBANG</th>
                        <th>PERUMAHAN</th>
                        <th>ALAMAT</th>
                        <th>NO.SURAT PENGESAHAN</th>
                        <th>TGL.PENGESAHAN</th>
                        <th>LUAS</th>
                        <th>STATUS</th>
                        <th><center>AKSI</center></th>
                    </tr>
                </thead>
                <tbody id="result-rekap">
                    {{--  @php
                    $no = 1
                    @endphp
                    @foreach ($pemohon as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="#" data-toggle="modal" data-target="#modal-detail-pemohon" data-id="{{ $p->id }}">{{ $p->pengembang->nama_perusahaan ?? "-" }}</a></td>
                        <td>{{ $p->nama_lengkap_pengembang }}</td>
                        <td>{{ $p->nomor_surat_permohonan }}</td>
                        <td>{{ $p->tanggal_surat_permohonan->format('d-m-Y') }}</td>
                        <td>{{ $p->nama_perumahan }}</td>
                        <td>{{ $p->luas_lahan }}</td>
                        <td>@if ($p->status == 0)
                                <span class="label label-primary">Penginputan</span>
                            @endif
                            @if ($p->status == 1)
                               <span class="label label-warning">Verifikasi</span>
                            @endif
                            @if ($p->status == 2)
                               <span class="label label-success">Disetujui</span>
                            @endif
                            @if ($p->status == 3)
                               <span class="label label-danger">Ditolak</span>
                            @endif
                    </td>
                        <td nowrap align="center" width="15%">
                            
                            <form action="{{ route('permohonan.destroy',$p->id) }}" method="POST">
                                <div class="btn-group mr5">
                                    <button type="button" class="btn btn-sm btn-primary">Verifikasi</button>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" onclick="statusVerifikasi('{{ $p->id }}','2')"><i class="fa fa-check"></i> Disetujui</a></li>
                                    <li><a href="#" onclick="statusVerifikasi('{{ $p->id }}','3')"><i class="fa fa-close"></i> Ditolak</a></li>
                                    </ul>
                                </div>
                            <a href="{{ route('permohonan.edit', $p->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                    HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach  --}}
                </tbody>
            </table>
        </div>
    </div>
</div><!-- panel -->

@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Select2
        $('select').select2({ minimumResultsForSearch: Infinity });

    $('#modalPengesahan').on('shown.bs.modal', function (e) {
        var data = $(e.relatedTarget);
            var id = data.data('id');
            $(this).find("#pengesahanID").val(id);
        });

});
</script>

@endpush