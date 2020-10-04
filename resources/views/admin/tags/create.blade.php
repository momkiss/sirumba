@extends('layouts.master')
@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			TAMBAH TAG BARU
		</div>

		<div class="panel-body">
			<form action="{{ route('tag.store') }}" method="post" >
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">TAG</label>
					<input type="text" name="tag" id="" class="form-control">
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