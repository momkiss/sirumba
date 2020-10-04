@extends('layouts.master')
@section('content')
<section class="card">
    <header class="card-header">
        <h4><strong><i class="fa fa-user"></i> EDIT USER</strong></h4>
        <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-times"></a>
        </span>Manajemen Users
    </header>
    <div class="card-body">
        <form class="form-horizontal" action="{{ route('users.update', $user) }}" method="POST">
            <div class="form-group">
                <label for="email" class="col-sm-2"><strong>Email *</strong></label>
                <div class="col-sm-10">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2"><strong>Nama</strong></label>
                <div class="col-sm-10">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required  autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="roles" class="col-sm-2"><strong>Roles</strong></label>
                   <div class="col-md-6">
                        @foreach ($roles as $role)
                        <div class="col-md-3 row">
                            <input type="checkbox" class="icheck-aero" name="roles[]" value="{{ $role->id }}"
                                @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                            <label for="" >{{ $role->name }}</label>
                        </div>
                        @endforeach
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary pull-right">UPDATE</button>
        </form>
    </div>
</section>
@endsection

