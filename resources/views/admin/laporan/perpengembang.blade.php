
@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h2 class="text-success mt0"><i class="fa fa-edit"></i> <strong>LAPORAN PER PENGEMBANG/PERUSAHAAN</strong></h2>
        <hr style="margin: 0 !important">
        <h4 class="panel-title mt10">PENGEMBANG/PERUSAHAAN</h4>
        <p>Menampilkan laporan berdasarkan pengembang/perusahaan.</p>
    </div>

    <div class="panel-body">
    <form action="{{ route('laporan.perpengembang.tampil') }}" method="get">
        <div class="row">
            <div class="col-xs-6">
                <label>Pengembang</label>
                <select name="pengembang" class="form-control">
                    <option value="">---</option>
                    @foreach ($pengembang as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_perusahaan }}</option>
                    @endforeach
                </select>
                <div class="mb20 invisible"></div>
            </div>
       
            <div class="col-xs-3">
                <br>
                  <button class="btn btn-danger mt5" type="submit"><i class="fa fa-search"></i> TAMPILKAN</button>
            </div>
        </div>
    </div><!-- panel-body -->
</div><!-- panel -->

<div class="panel">
    <div class="panel-heading">
        <h4 class="panel-title">LAPORAN PER PENGEMBANG/PERUSAHAAN</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="tbl-lap" class="table table-bordered table-inverse nomargin" style="width: 100%">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>PERUSAHAAN</th>
                        <th>PERUMAHAN</th>
                        <th>ALAMAT</th>
                        <th>NO.SURAT PENGESAHAN</th>
                        <th>TGL PENGESAHAN</th>
                        <th>LUAS</th>
                        <th>
                            <center>#</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1
                    @endphp
                    @isset($permohonan)
                        @if (count($permohonan) > 0)
                            @foreach ($permohonan as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->pengembang->nama_perusahaan ?? "" }}</td>
                                <td>{{ $p->nama_perumahan }}</td>
                                <td>{{  $p->alamat_jalan_perumahan.' - '.$p->kelurahan_perumahan->nama ?? "".' - '.$p->kecamatan_perumahan->nama ?? "" }}</td>
                                <td>{{ $p->nomor_surat_permohonan }}</td>
                                <td>{{ $p->tanggal_surat_permohonan->format('d-m-Y') }}</td>
                                <td>{{ $p->luas_lahan }}</td>
                                <td nowrap align="center">
                                    <a href="{{ route('laporan.permohonan', ['id' => $p->id]) }}" target="_blank" class="btn btn-success btn-sm tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Permohonan"><i class="fa fa-envelope-o"></i></a>
                                    <a href="{{ route('laporan.kelengkapan', ['id' => $p->id]) }}" target="_blank" class="btn btn-danger btn-sm tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Kelengkapan"><i class="fa fa-file-text-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7"><center>Data tidak ditemukan</center></td>
                            </tr>
                        @endif
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div><!-- panel -->


<!-- Modal -->
<div class="modal fade" id="modal-detail-laporan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {



  $('#tbl-lap').DataTable({
      dom: 'Bfrtip',

        buttons: [
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                pageSize: 'A4',
                orientation: 'portrait',
                exportOptions: {
                columns: [ 0, 1, 2, 3,4,5 ]
                    }
            },
            {
                extend: 'excelHtml5',
                text: 'EXCEL',
                exportOptions: {
                columns: [ 0, 1, 2, 3,4,5 ]
                }
            },
            {
                extend: 'print',
                text: 'CETAK',
                exportOptions: {
                columns: [ 0, 1, 2, 3,4,5 ]
                }
            },
        ]
  });
  // Select2
  $('select').select2({ minimumResultsForSearch: Infinity });

});
</script>
@endpush