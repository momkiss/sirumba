@extends('layouts.master')
@section('content')
<div class="panel">
    <div class="panel-body">
       <div class="panel-heading nopadding">
            <h2 class="text-success nopadding"><i class="fa fa-edit"></i> <strong>HALAMAN STATIS</strong></h2>
            <a role="button" class="btn btn-success btn-quirk mb20 pull-right" href="{{ route('page.create') }}">TAMBAH</a>
           <p>Manajemen Halaman Statis.</p>
        </div>

        <table class="table table-bordered table-inverse nomargin">
            <thead>
                <th>NO.</th>
                <th>GAMBAR</th>
                <th>JUDUL</th>
                <th>SLUG</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                @if($pages->count() > 0)

                @php
                    $no = 1
                @endphp
                @foreach($pages as $page)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><img src="{{ $page->featured }}" alt="{{ $page->featured }}" width="50px"></td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td><a href="{{ route('page.edit', $page->id ) }}" class="btn btn-sm btn-success m-r-5" style="float:left">Edit</a>

                        <form action="{{ route('page.destroy', $page->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5">
                        <center> Tidak ada halaman statis. </center>
                    </th>
                </tr>

                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection