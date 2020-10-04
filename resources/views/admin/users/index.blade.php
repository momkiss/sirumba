@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
@endpush
@section('content')
  <div class="panel">
      <div class="panel-heading">
          <h4 class="panel-title"><strong>DATA PENGGUNA</strong></h4>
          <button class="btn btn-success btn-quirk pull-right" data-toggle="modal" data-form="tambah" data-target="#users-tambah">TAMBAH</button>
          <p>Menampilkan data pengguna.</p>
      </div>
          
      <div class="panel-body">
          <div class="table-responsive">
              <table id="dataTable1" class="table table-bordered table-striped-col">
                  <thead>
                      <tr>
                          <th>NO.</th>
                          <th>USERNAME</th>
                          <th>EMAIL</th>
                          <th>ROLE</th>
                          <th>AKSI</th>
                      </tr>
                  </thead>  
                  <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($users as $user)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                          <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            <a class="btn btn-sm btn-warning" data-nama="{{ $user->name }}" data-email="{{ $user->email }}" data-target="#users-tambah" data-toggle="modal" data-form="edit" data-id="{{ $user->id }}"><i class="fa fa-edit"></i> Edit</a>
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
<div class="modal fade" id="users-tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header panel panel-success-full">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-edit"></i> TAMBAH PENGGUNA</h4>
      </div>
      <div class="modal-body">
          <form action="{{url('post-daftar')}}" method="post" id="form-users">
            <input type="hidden" name="_method">
            @csrf
            <div class="form-group">
              <label class="control-label center-block"><strong>USERNAME</strong></label>
              <input type="text" class="form-control" placeholder="Isikan username" name="name">
            </div>
            <div class="form-group">
              <label class="control-label center-block"><strong>EMAIL</strong></label>
              <input type="text" class="form-control" placeholder="Isikan email" name="email">
            </div>
            <div class="form-group">
              <label class="control-label center-block"><strong>PASSWORD</strong></label>
              <input type="password" class="form-control" placeholder="Isikan password" name="password">
            </div>
            {{-- <div class="form-group">
                  <label for="roles" class="control-label center-block"><strong>Roles</strong></label>
                  <div class="col-md-6">
                    @foreach ($roles as $role)
                      <input  type="checkbox"  name="roles[]" value="{{ $role->id }}">
                      <label for="">{{ $role->name }}</label>
                    @endforeach
                  </div>
              </div> --}}
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

$('#users-tambah').on('show.bs.modal', function(e){
    var data = $(e.relatedTarget)
    var id = data.data('id')
    var form = data.data('form')
    var nama = data.data('nama')
    var email = data.data('email')

    var modal = $(this)

    if(form == "edit")
    {

      $('#form-users').attr('action', BASE_URL+'/users/'+id);
      $('#form-users').find($('input[name="_method"]')).attr('value', 'PUT');
      modal.find('.modal-title').html('<i class="fa fa-edit"></i> EDIT PENGGUNA');
      modal.find($('input[name="name"]')).val(nama);
      modal.find($('input[name="email"]')).val(email);
      modal.find($('button[type="submit"]')).html('<i class="fa fa-save"></i> UPDATE');
    }

    if(form == "tambah")
    {
      $('#form-users').find($('input[name="_method"]')).attr('value', 'POST');
      modal.find('.modal-title').html('<i class="fa fa-edit"></i> TAMBAH PENGGUNA');
      modal.find($('input[name="name"]')).val("");
      modal.find($('input[name="email"]')).val("");
      modal.find($('input[name="password"]')).val("");
      modal.find($('button[type="submit"]')).html('<i class="fa fa-save"></i> TAMBAH');
    }

    // alert(id);
    
});

  $('#dataTable1').DataTable();

  var exRowTable = $('#exRowTable').DataTable({
    responsive: true,
    'fnDrawCallback': function(oSettings) {
      $('#exRowTable_paginate ul').addClass('pagination-active-success');
    },
    'ajax': 'ajax/objects.txt',
    'columns': [{
      'class': 'details-control',
      'orderable': false,
      'data': null,
      'defaultContent': ''
    },
    { 'data': 'name' },
    { 'data': 'position' },
    { 'data': 'office' },
    { 'data': 'start_date'},
    { 'data': 'salary' }
    ],
    'order': [[1, 'asc']]
  });

  // Add event listener for opening and closing details
  $('#exRowTable tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = exRowTable.row( tr );

    if ( row.child.isShown() ) {
      // This row is already open - close it
      row.child.hide();
      tr.removeClass('shown');
    } else {
      // Open this row
      row.child( format(row.data()) ).show();
      tr.addClass('shown');
    }
  });

  function format (d) {
    // `d` is the original data object for the row
    return '<h4>'+d.name+'<small>'+d.position+'</small></h4>'+
    '<p class="nomargin">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
  }

  // Select2
  $('select').select2({ minimumResultsForSearch: Infinity });

});
</script>
 @endpush