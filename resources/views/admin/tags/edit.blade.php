@extends('layouts.master')
@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			EDIT TAG : {{ $tag->tag }}
		</div>

		<div class="panel-body">
			<form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post" >
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Tag</label>
					<input type="text" name="tag" id="" class="form-control" value="{{ $tag->tag }}">
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