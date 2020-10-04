@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
@endpush
@section('content')
  <div class="panel">
      <div class="panel-heading">
          <h4 class="panel-title"><strong>DATA KELURAHAN</strong></h4>
          <button class="btn btn-success btn-quirk pull-right" data-toggle="modal" data-form="tambah" data-target="#kelurahan-tambah">TAMBAH</button>
          <p>Menampilkan data kelurahan.</p>
      </div>
          
      <div class="panel-body">
          <div class="table-responsive">
              <table id="dataTable1" class="table table-bordered table-striped-col">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>KODE</th>
                          <th>NAMA</th>
                          <th>KECAMATAN</th>
                          <th>AKSI</th>
                      </tr>
                  </thead>  
                  <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($kelurahan as $kel)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $kel->kode }}</td>
                          <td>{{ $kel->nama }}</td>
                          <td>{{ $kel->masterKecamatan->nama ?? "" }}</td>
                          <td>
                            <form action="{{ route('kelurahan.destroy',$kel->id) }}" method="POST">
                            <a class="btn btn-sm btn-warning" data-kode="{{ $kel->kode }}" data-nama="{{ $kel->nama }}" data-target="#kelurahan-tambah" data-toggle="modal" data-form="edit" data-id="{{ $kel->id }}"><i class="fa fa-edit"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                              
                            </form>
                           </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div><!-- panel -->

<!-- Modal -->
<div class="modal bounceIn animated" id="kelurahan-tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header panel panel-success-full">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-edit"></i> TAMBAH KELURAHAN</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('kelurahan.store') }}" method="post" id="form-kelurahan">
            <input type="hidden" name="_method">
            @csrf
            <div class="form-group">
              <label class="control-label center-block"><strong>KODE</strong></label>
              <input type="text" class="form-control" placeholder="Isikan kode kelurahan" name="kode">
            </div>
                <div class="form-group">
                  <label class="control-label center-block"><strong>KECAMATAN</strong></label>
                  <select class="form-control" name="master_kecamatan_id" style="width: 100%" data-placeholder="Pilih Kecamatan">
                      <option value=""> --- </option>
                        @foreach ($kecamatan as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->nama }}</option>
                        @endforeach
                  </select>
                </div>
            <div class="form-group">
              <label class="control-label center-block"><strong>NAMA</strong></label>
              <input type="text" class="form-control" placeholder="Isikan nama kelurahan" name="nama">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> TUTUP</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
      </div>
    </form>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->
 @endsection

@push('js')
<script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>

 <script>
  $(document).ready(function() {

$('#kelurahan-tambah').on('show.bs.modal', function(e){
    var data = $(e.relatedTarget)
    var id = data.data('id')
    var form = data.data('form')
    var kode = data.data('kode')
    var nama = data.data('nama')

    var modal = $(this)

    if(form == "edit")
    {

      $('#form-kelurahan').attr('action', BASE_URL+'/kelurahan/'+id);
      $('#form-kelurahan').find($('input[name="_method"]')).attr('value', 'PUT');
      modal.find('.modal-title').html('<i class="fa fa-edit"></i> EDIT KELURAHAN');
      modal.find($('input[name="kode"]')).val(kode);
      modal.find($('input[name="nama"]')).val(nama);
      modal.find($('button[type="submit"]')).html('<i class="fa fa-save"></i> UPDATE');
    }

    if(form == "tambah")
    {
      $('#form-kelurahan').find($('input[name="_method"]')).attr('value', 'POST');
      modal.find('.modal-title').html('<i class="fa fa-edit"></i> TAMBAH KELURAHAN');
      modal.find($('input[name="kode"]')).val("");
      modal.find($('input[name="nama"]')).val("");
      modal.find($('button[type="submit"]')).html('<i class="fa fa-save"></i> TAMBAH');
    }

    // alert(id);
    
});

  $('#kelurahan-select2').select2();
  $('#dataTable1').DataTable();


});
</script>
 @endpush