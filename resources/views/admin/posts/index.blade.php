@extends('layouts.master')
@section('content')
<div class="panel">
    <div class="panel-body">
       <div class="panel-heading nopadding">
            <h2 class="text-success nopadding"><i class="fa fa-edit"></i> <strong>POST BERITA</strong></h2>
            <a role="button" class="btn btn-success btn-quirk mb20 pull-right" href="{{ route('post.create') }}">TAMBAH</a>
           <p>Manajemen berita.</p>
        </div>

        <table class="table table-bordered table-inverse nomargin">
            <thead>
                <th>NO.</th>
                <th>GAMBAR</th>
                <th>JUDUL</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                @if($posts->count() > 0)

                @php
                    $no = 1
                @endphp
                @foreach($posts as $post)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><img src="{{ asset($post->featured) }}" alt="{{ $post->featured }}" width="50px"></td>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route('post.edit',['id' => $post->id] ) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('post.delete',['id' => $post->id] ) }}"
                            class="btn btn-sm btn-danger">Trash</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5">
                        <center> Tidak ada post berita. </center>
                    </th>
                </tr>

                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection