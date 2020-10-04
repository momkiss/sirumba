@extends('layouts.master')
@section('content')

<div class="panel">
	<div class="panel-body">
		<div class="panel-heading nopadding">
			<h2 class="text-success nopadding"><i class="fa fa-edit"></i> <strong>SLIDER</strong></h2>
			<a href="{{ route('slider.create') }}" class="btn btn-success mb20 pull-right" role="button">TAMBAH</a>
			<p>Manajemen Slider.</p>
		</div>
		<table class="table table-bordered table-inverse nomargin">
			<thead>
				<th>No.</th>
				<th>Nama</th>
				<th>Deskripsi</th>
				<th>Urutan</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				@php
					$no = 1
				@endphp
				@if($slider->count() > 0) 			
						 @foreach($slider as $a)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $a->nama }}</td>
								<td>{{ $a->deskripsi }}</td>
								<td>{{ $a->urutan }}</td>

								<td><a href="{{ route('slider.edit',$a->id ) }}" class="btn btn-sm btn-success">EDIT</a>

								
									<form action="{{ route('slider.destroy',$a->id) }}" method="POST">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
									</form>
								</td>
			
							</tr>
						@endforeach
				@else
			<tr>
				<th colspan="5"><center> Belum ada slider. </center></th>
			</tr>

		@endif				
			</tbody>
		</table>	
</div>
</div>


@stop