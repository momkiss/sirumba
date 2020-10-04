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
			EDIT SLIDER
		</div>

		<div class="panel-body">
			<form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
				{{method_field('PUT')}}
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Nama</label>
				<input type="text" name="nama" id="" class="form-control" value="{{ $slider->nama }}">
				</div>
				<div class="form-group">
					<label for="featured">Deskripsi</label>
					<input type="text" name="deskripsi" id="" class="form-control" placeholder="" value="{{ $slider->deskripsi }}">
				</div>
				<div class="form-group">
					<label for="category">Urutan</label>	
					<input type="text" name="urutan" id="" class="form-control" placeholder="" value="{{ $slider->urutan }}">
				</div>
				<div class="form-group">
					<label for="featured">Foto</label>
					<input type="file" name="link" id="" class="form-control" placeholder="">
					<img src="{{ url('/') }}/{{ $slider->link }}" alt="" style="margin-top:20px" width="150">
				</div>
				<div class="form-group">
					@if ($slider->aktif === '1')
						<input type="radio" name="aktif" id="" value="1" style="margin-right:10px" checked><label for="category"
						style="margin-right:30px">Aktif</label>
					@else 
						<input type="radio" name="aktif" id="" value="1" style="margin-right:10px"><label for="category"
							style="margin-right:30px">Aktif</label>
					@endif

					@if ($slider->aktif === '0')
						<input type="radio" name="aktif" id="" value="0" style="margin-right:10px" checked><label for="category"
						style="margin-right:30px" >Tidak Aktif</label>
					@else 
						<input type="radio" name="aktif" id="" value="0" style="margin-right:10px"><label for="category"
							style="margin-right:30px">Tidak Aktif</label>
					@endif
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
