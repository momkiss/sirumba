@extends('layouts.master')
@section('content')

<div class="panel">
	<div class="panel-body">
		<div class="panel-heading nopadding">
			<h2 class="text-success nopadding"><i class="fa fa-edit"></i> <strong>GALERI FOTO</strong></h2>
			<a role="button" class="btn btn-success btn-quirk mb20 pull-right" href="{{ route('galeri.create') }}">TAMBAH</a>
			<p>Manajemen Galeri Foto.</p>
		</div>
		<table class="table table-bordered table-inverse nomargin">
			<thead>
				<th>NO.</th>
				<th>GAMBAR</th>
				<th>NAMA</th>
				<th>KETERANGAN</th>
				<th>AKSI</th>
			</thead>
			<tbody>
				@php
					$no = 1
				@endphp
				@if($galeri->count() > 0) 			
						 @foreach($galeri as $a)
							<tr>
								<td>{{ $no++ }}</td>
								<td><img src="{{ url('/') }}/{{ $a->link }}" alt="" width="150"></td>
								<td>{{ $a->nama }}</td>
								<td>{{ $a->keterangan }}</td>

								<td><a href="{{ route('galeri.edit', $a->id ) }}" class="btn btn-sm btn-success">EDIT</a>
									<form action="{{ route('galeri.destroy',$a->id) }}" method="POST">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
									</form>
								</td>
			
							</tr>
						@endforeach
				@else
			<tr>
				<th colspan="6"><center> Tidak ada foto di dalam galeri. </center></th>
			</tr>

		@endif				
			</tbody>
		</table>	
</div>
</div>


@stop