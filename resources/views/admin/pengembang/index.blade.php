@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
@endpush
@section('content')

@if(session()->has('pesan'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Pemberitahuan ! {{ session()->get('pesan') }}
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="modal-detail-pemohon" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h2 class="text-success mt0" ><i class="fa fa-edit"></i> <strong>DATA PENGEMBANG PERUMAHAN</strong>
        <a href="{{ route('pengembang.create') }}" class="btn btn-success btn-quirk pull-right"><i class="fa fa-plus"></i> TAMBAH</a>
        </h2>
        <hr>
        <p></p>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table id="dataTable1" class="table table-bordered table-inverse nomargin">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NAMA PERUSAHAAN</th>
                        <th>ALAMAT</th>
                        <th>DIREKTUR</th>
                        <th>TELP.</th>
                        <th><center>AKSI</center></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1
                    @endphp
                    @foreach ($pengembang as $p)

                    @php
                        if ($p->alamat_kecamatan != "" && $p->alamat_kelurahan != "") {
                            $domisili = 1;
                        }else{
                            $domisili = 0;
                        }
                        @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                    <td>{{ $p->nama_perusahaan }} 
                        @if ($domisili == 1)
                            <span class="label label-success">Lokal</span>
                        @else
                            <span class="label label-danger">Luar</span>
                        @endif
                        </td>
                        <td>
                            {{ $p->alamat_jalan ?? "" }} {{ $p->alamat_rt ?? "" }}, {{ $p->kelurahan->nama ?? $p->alamat_kelurahan_luar }}, {{ $p->kecamatan->nama ?? $p->alamat_kecamatan_luar }}</td>
                        <td>{{ $p->direktur }}</td>
                        <td>{{ $p->telp }}</td>
                        <td nowrap align="center">
                            <form action="{{ route('pengembang.destroy',$p->id) }}" method="POST">
                            <a href="{{ route('pengembang.edit', $p->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                    HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div><!-- panel -->

@endsection

@push('js')
<script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable1').DataTable();
        // Select2
        $('select').select2({ minimumResultsForSearch: Infinity });
});
</script>
@endpush