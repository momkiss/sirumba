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

	<div class="panel panel-danger">
		<div class="panel-heading">
			<h2 class="panel-title"><span class="fa fa-edit"></span> TAMBAH HALAMAN STATIS</h2>
		</div>

		<div class="panel-body">
			<form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title"><strong>JUDUL</strong></label>
					<input type="text" name="title" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="featured"><strong>GAMBAR</strong></label>
					<input type="file" name="featured" id="" class="form-control">
				</div>

				<div class="form-group">
					<label for="content"><strong>KONTEN</strong></label>
					<textarea name="content" id="summernote_page"  cols="5" rows="5" class="form-control"></textarea>
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


@push('css')
<link rel="stylesheet" href="{{ asset('lib/summernote/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.css') }}">
@endpush


@push('js')
<script src="{{ asset('lib/wysihtml5x/wysihtml5x.js') }}"></script>
<script src="{{ asset('lib/wysihtml5x/wysihtml5x-toolbar.js') }}"></script>
<script src="{{ asset('lib/handlebars/handlebars.js') }}"></script>
<script src="{{ asset('lib/summernote/summernote.js') }}"></script>
<script src="{{ asset('lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.all.js') }}"></script>

<script>
	$(document).ready(function() {
        $('#summernote_page').summernote({
			height: 200
		});
    });
</script>
@endpush