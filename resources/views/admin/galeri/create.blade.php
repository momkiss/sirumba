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
			Tambah Galeri
		</div>
		<div class="panel-body">
			<form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Nama</label>
					<input type="text" name="nama" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="title">Keterangan</label>
					<input type="text" name="keterangan" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="featured">Gambar</label>
					<input type="file" name="link" id="" class="form-control" placeholder="">
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
