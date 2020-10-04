@extends('layouts.master')
@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			UPDATE KATEGORI : {{ $category->name }}
		</div>

		<div class="panel-body">
			<form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" >
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">NAMA</label>
					<input type="text" name="name" id="" class="form-control" value="{{ $category->name }}">
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