@extends('layouts.master')
@section('content')

<div class="panel">
    <div class="panel-body">
        <div class="panel-heading nopadding">
            <h2 class="text-success nopadding"><i class="fa fa-edit"></i> <strong>TAG</strong></h2>
            <a role="button" class="btn btn-success btn-quirk mb20 pull-right" href="{{ route('tag.create') }}">TAMBAH</a>
            <p>Manajemen Tag Berita.</p>
        </div>
        <table class="table table-bordered table-inverse nomargin">
            <thead>
                <th>NO.</th>
                <th>NAMA</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                @if($tags->count() > 0)
                @php
                    $no = 1
                @endphp
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $tag->tag }}</td>
                    <td>
                        <a href="{{route('tag.edit',['id' => $tag->id ]) }}" class="btn btn-sm btn-info">
                            EDIT
                        </a>
                        <a href="{{route('tag.delete',['id' => $tag->id ]) }}" class="btn btn-sm btn-danger">
                            HAPUS
                        </a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="4">
                        <center> Belum ada tag. </center>
                    </th>
                </tr>

                @endif
            </tbody>
        </table>
    </div>
</div>


@stop