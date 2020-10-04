@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
@endpush
@section('content')
  <div class="panel">
      <div class="panel-heading">
          <h4 class="panel-title"><strong>JENIS PERUMAHAN</strong></h4>
          <button class="btn btn-success btn-quirk pull-right" data-toggle="modal" data-form="tambah" data-target="#jenis-perumahan-tambah">TAMBAH</button>
          <p>Menampilkan jenis perumahan.</p>
      </div>
          
      <div class="panel-body">
          <div class="table-responsive">
              <table id="dataTable1" class="table table-bordered table-striped-col">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>NAMA</th>
                          <th>AKSI</th>
                      </tr>
                  </thead>  
                  <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($jenisperumahan as $perumahan)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $perumahan->nama }}</td>
                          <td>
                            <form action="{{ route('jenis-perumahan.destroy',$perumahan->id) }}" method="POST">
                            <a class="btn btn-sm btn-warning"  data-nama="{{ $perumahan->nama }}" data-target="#jenis-perumahan-tambah" data-toggle="modal" data-form="edit" data-id="{{ $perumahan->id }}"><i class="fa fa-edit"></i> Edit</a>
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
<div class="modal bounceIn animated" id="jenis-perumahan-tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header panel panel-success-full">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-edit"></i> TAMBAH JENIS PERUMAHAN</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('jenis-perumahan.store') }}" method="post" id="form-jenis-perumahan">
            <input type="hidden" name="_method">
            @csrf
            <div class="form-group">
              <label class="control-label center-block"><strong>NAMA</strong></label>
              <input type="text" class="form-control" placeholder="Isikan jenis perumahan" name="nama">
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

$('#jenis-perumahan-tambah').on('show.bs.modal', function(e){
    var data = $(e.relatedTarget)
    var id = data.data('id')
    var form = data.data('form')
    var nama = data.data('nama')

    var modal = $(this)

    if(form == "edit")
    {

      $('#form-jenis-perumahan').attr('action', BASE_URL+'/jenis-perumahan/'+id);
      $('#form-jenis-perumahan').find($('input[name="_method"]')).attr('value', 'PUT');
      modal.find('.modal-title').html('<i class="fa fa-edit"></i> EDIT JENIS PERUMAHAN');
      modal.find($('input[name="nama"]')).val(nama);
      modal.find($('button[type="submit"]')).html('<i class="fa fa-save"></i> UPDATE');
    }

    if(form == "tambah")
    {
      $('#form-jenis-perumahan').find($('input[name="_method"]')).attr('value', 'POST');
      modal.find('.modal-title').html('<i class="fa fa-edit"></i> TAMBAH JENIS PERUMAHAN');
      modal.find($('input[name="nama"]')).val("");
      modal.find($('button[type="submit"]')).html('<i class="fa fa-save"></i> TAMBAH');
    }

    // alert(id);
    
});

  $('#dataTable1').DataTable();
  // Select2
  $('select').select2({ minimumResultsForSearch: Infinity });

});
</script>
 @endpush