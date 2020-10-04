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
			Edit Galeri
		</div>
		<div class="panel-body">
			<form action="{{ route('galeri.update', $galeri->id) }}" method="post" enctype="multipart/form-data">
				{{method_field('PUT')}}
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Nama</label>
					<input type="text" name="nama" id="" class="form-control" value="{{ $galeri->nama }}">
				</div>
				<div class="form-group">
					<label for="title">Keterangan</label>
					<input type="text" name="keterangan" id="" class="form-control" value="{{ $galeri->keterangan }}">
				</div>
				<div class="form-group">
					<label for="featured">Gambar</label>
					<input type="file" name="link" id="" class="form-control" placeholder="">
					<img src="{{ url('/') }}/{{ $galeri->link }}" alt="" width="150" style="margin-top:20px">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">UPDATE</button>
					</div>
				</div>	
			</form>
		</div>
	</div>
@stop
