@extends('layouts.master')
@section('content')

<div class="panel">
	<div class="panel-body">
		<div class="panel-heading nopadding">
            <h2 class="text-success nopadding"><i class="fa fa-edit"></i> <strong>TRASH POST BERITA</strong></h2>
            <a role="button" class="btn btn-success btn-quirk mb20 pull-right" href="{{ route('post.create') }}">TAMBAH POST BERITA</a>
           <p>Post Berita yang sudah dihapus.</p>
        </div>

		<table class="table table-bordered table-inverse nomargin">
			<thead>
				<th>NO.</th>
				<th>GAMBAR</th>
				<th>JUDUL</th>
				<th>RESTORE</th>
				<th>HAPUS PERMANEN</th>
			</thead>
			<tbody>

		@if($posts->count() > 0 )
			@php
				$no = 1
			@endphp
			 @foreach($posts as $post)
					<tr>
						<td>{{ $no++  }}</td>
						<td><img src="{{ asset($post->featured) }}" alt="{{ $post->featured }}" width="50px"></td>
						<td>{{ $post->title }}</td>
						<td>
							<a href="{{ route('post.restore',['id' => $post->id] ) }}" class="btn btn-sm btn-info">RESTORE</a>
						</td>
						<td>
							<a href="{{ route('post.kill',['id' => $post->id] ) }}" class="btn btn-sm btn-danger">HAPUS</a>
						</td>
	
					</tr>
				@endforeach

		@else
			<tr>
				<th colspan="5"><center>Belum ada post berita yang dihapus. </center></th>
			</tr>

		@endif
				
			</tbody>
		</table>	
</div>
</div>


@stop