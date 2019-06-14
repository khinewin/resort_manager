@extends('layout.app')
@section('title') Login @stop

<style>
    body{
        background: url('../images/resort.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                @if(Session('err'))
                    <div class="alert alert-danger">
                        {{Session('err')}}
                    </div>
                @endif

                    <h1 class="text-primary text-center authHeader">{{$config->title}}</h1>
                    <h5 class="text-center">Resort Manager</h5>
                    <p class="text-center">login to start your control</p>
               <div class="card">
                   <div class="card-body">
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
                               <button type="submit" class="btn btn-outline-primary btn-lg">Login</button>
                           </div>
                           @csrf
                       </form>
                   </div>
               </div>
            </div>
        </div>
    </div>

    @stop