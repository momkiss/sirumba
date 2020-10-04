@extends('layouts.master')
@section('content')

<div class="panel">
    <div class="panel-body">

        <div class="panel-heading nopadding">
           <h2 class="text-success nopadding"><i class="fa fa-edit"></i> <strong>KATEGORI BERITA</strong></h2>
           <a role="button" class="btn btn-success btn-quirk mb20 pull-right" href="{{ route('category.create') }}">TAMBAH</a>
            <p>Manajemen Kategori Berita</p>
        </div>

        <table class="table table-bordered table-inverse nomargin">
            <thead>
                <th>NO.</th>
                <th>NAMA KATEGORI</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                @if($categories->count() > 0)
                @php
                $no = 1
                @endphp
                @foreach($categories as $category)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{route('category.edit',['id' => $category->id ]) }}" class="btn btn-xs btn-info">
                            EDIT
                        </a>
                        <a href="{{route('category.delete',['id' => $category->id ]) }}" class="btn btn-xs btn-danger">
                            HAPUS
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5">
                        <center> Belum ada kategori berita. </center>
                    </th>
                </tr>

                @endif
            </tbody>
        </table>
    </div>
</div>


@stop