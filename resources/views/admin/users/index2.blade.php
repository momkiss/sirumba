@extends('layouts.master')
@push('css')
<link href="{{ ('assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
<link href="{{ ('assets/data-tables/DT_bootstrap.css') }}" rel="stylesheet" />
@endpush
@section('content')

<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                <h4><strong><i class="fa fa-users"></i> USERS</strong></h4>
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>Manajemen Users
            </header>
            <div class="card-body">
            <a href="{{ route('users.create') }}" role="button" class="btn btn-primary"><i
                        class="fa fa-plus"></i> TAMBAH</a>
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>ID.</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>
                                        {{-- @can('edit-users') --}}
                                        
                                        {{-- @endcan
                                        @can('delete-users') --}}
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            <div class="btn-group btn-group-justified">
                                                <a href="{{ route('users.edit', $user->id) }}" role="button" class="btn btn-sm btn-secondary">Edit</a>
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                        {{-- @endcan --}}
                                
                                        {{-- <a href="{{ route('admin.users.destroy', $user->id) }}"></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
@push('skrip')
<script src="{{ asset('assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/data-tables/DT_bootstrap.js') }}"></script>
<script src="{{ asset('js/dynamic_table_init.js') }}"></script>

@endpush
