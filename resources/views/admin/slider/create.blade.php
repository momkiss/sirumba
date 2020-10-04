@extends('layouts.master')
@section('content')

@if(count($errors) > 0)

	<ul class="list-group">
		@foreach($errors->all() as $error)

			<li class="list-group-item text-danger">
				{{ $error }}
			</li>		
		@endforeach
	</ul>


@endif

	<div class="panel panel-default">
		<div class="panel-heading">
			TAMBAH SLIDER
		</div>

		<div class="panel-body">
			<form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Nama</label>
					<input type="text" name="nama" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="featured">Deskripsi</label>
					<input type="text" name="deskripsi" id="" class="form-control" placeholder="">
				</div>
				<div class="form-group">
					<label for="category">Urutan</label>	
					<input type="text" name="urutan" id="" class="form-control" placeholder="">
				</div>
				<div class="form-group">
					<label for="featured">Foto</label>
					<input type="file" name="link" id="" class="form-control" placeholder="">
				</div>
				<div class="form-group">
					<input type="radio" name="aktif" id="" value="1" style="margin-right:10px"><label for="category" style="margin-right:30px">Aktif</label>
					<input type="radio" name="aktif" id="" value="0" style="margin-right:10px"><label for="category">Tidak Aktif</label>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">SIMPAN</button>
					</div>
				</div>	
			</form>
		</div>
	</div>

@stop
