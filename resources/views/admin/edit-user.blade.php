@extends('layout.backend')

@section('title') Edit User @stop

@section('header')<i class="fa fa-edit"></i> Edit User @stop
@section('small') Resort Manager @stop
@section('level')<i class="fa fa-edit"></i> Resort Manager @stop
@section('active') Edit User @stop

@section('content')

    <div class="row bodyPadding">
        <div class="col-md-12">
            @if(Session('info'))
                <div class="alert alert-success">
                    {{Session('info')}}
                </div>
        @endif

        <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> Edit User</h3>
                    <a href="{{route('users')}}" class="pull-right"><i class="fa fa-users"></i> Users</a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form role="form" method="post" action="{{route('user.update')}}">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="box-body">
                                <div class="form-group @if($errors->has('name')) has-error @endif">
                                    <label for="name" class="control-label">Username</label>
                                    <input value="{{$user->name}}" type="text" name="name" id="name" class="form-control" placeholder="Username" >
                                    @if($errors->has('name')) <span class="help-block">{{$errors->first('name')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                    <label for="email" class="control-label">Email address</label>
                                    <input value="{{$user->email}}" type="email" name="email" class="form-control"  id="email" placeholder="Enter email" >
                                    @if($errors->has('email')) <span class="help-block">{{$errors->first('email')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('phone')) has-error @endif">
                                    <label for="phone" class="control-label">Phone</label>
                                    <input value="{{$user->phone}}" type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                    @if($errors->has('phone')) <span class="help-block">{{$errors->first('phone')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('role')) has-error @endif">
                                    <label for="role" class="control-label">Role</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option @if($role->name==$user->roles()->pluck('name')->implode('')) selected @endif>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('role')) <span class="help-block">{{$errors->first('role')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('password')) has-error @endif">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"  placeholder="Password" >
                                    @if($errors->has('password')) <span class="help-block">{{$errors->first('password')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('password_confirm')) has-error @endif">
                                    <label for="password_confirm" class="control-label">Password Confirm</label>
                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control"  placeholder="Password Confirm" >
                                    @if($errors->has('password_confirm')) <span class="help-block">{{$errors->first('password_confirm')}}</span> @endif
                                </div>


                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                <a href="{{route('users')}}" class="btn btn-default btn-lg">Cancel</a>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

