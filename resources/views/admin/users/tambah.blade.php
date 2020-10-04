@extends('layouts.master')
@section('content')
<section class="card">
    <header class="card-header">
        <h4><strong><i class="fa fa-user"></i> TAMBAH USER</strong></h4>
        <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-times"></a>
        </span>Manajemen Users
    </header>
    <div class="card-body">
        <form action="{{url('post-daftar')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label"><strong>Email *</strong></label>
                <div class="col-sm-10">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label"><strong>Nama</strong></label>
                <div class="col-sm-10">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        required autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label"><strong>Password</strong></label>
                <div class="col-sm-10">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        required autofocus>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{-- @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="roles" class="col-sm-2 control-label">Roles</label>
                <div class="col-md-6">
                    @foreach ($roles as $role)
                    <div class="col-md-3 row">
                        <input type="checkbox" class="icheck-aero" name="roles[]" value="{{ $role->id }}">
                        <label for="">{{ $role->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div> --}}
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
@endsection