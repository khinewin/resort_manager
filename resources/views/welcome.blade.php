@extends('layout.app')
@section('title') KTV Manager @stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 shadow mt-md-5 pt-3">
                @if(Session('err'))
                    <div class="alert alert-danger">
                        {{Session('err')}}
                    </div>
                @endif
                <div class="text-center text-success"><i class="fas fa-headphones-alt fa-5x"></i></div>
                <h2 class="text-primary text-center">KTV Manager</h2>
                <p class="text-info text-center">Login</p>
                <form method="post" action="{{route('login')}}">
                    <div class="form-group">
                        <label for="name">Username *</label>
                        <input type="text"  name="name" class="form-control @if($errors->has('name')) is-invalid @endif">
                        @if($errors->has('name')) <div class="invalid-feedback">{{$errors->first('name')}}</div> @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password"  name="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                        @if($errors->has('password')) <div class="invalid-feedback">{{$errors->first('password')}}</div> @endif

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @stop