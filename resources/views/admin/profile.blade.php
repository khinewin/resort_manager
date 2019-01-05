@extends('layout.backend')

@section('title') KTV Manager >> User Profile @stop


@section('header')<i class="fa fa-user-circle"></i> User Profile @stop
@section('small') KTV Manager @stop
@section('level') <a href="#"><i class="fa fa-user-circle"></i> Admin </a> @stop
@section('active') User Profile @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @if(Session('info'))
                            <div class="alert alert-success">{{Session('info')}}</div>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body box-info">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="{{URL::to('user_img/user1.png')}}" class="img-circle" width="100px" alt="User Image">
                                <ul class="list-group " style="margin-top: 20px">
                                    <li class="list-group-item">Username : <b class="text-dark">{{Auth::User()->name}}</b></li>
                                    <li class="list-group-item">Email : <b class="text-dark">{{Auth::User()->email}}</b></li>
                                    <li class="list-group-item">Phone : <b class="text-dark">{{Auth::User()->phone}}</b></li>
                                    <li class="list-group-item">Role : <b class="text-dark">{{Auth::User()->roles()->pluck('name')->implode('')}}</b></li>
                                    <li class="list-group-item">Member Since : <b class="text-dark">{{date('D(d)-m-Y / h:i A', strtotime(Auth::User()->created_at))}}</b></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Change password</div>
                                    <div class="panel-body">
                                        <form method="post" action="{{route('update.password')}}">
                                            <div class="form-group @if(Session('current_pass_err')) has-error @endif @if($errors->has('current_password')) has-error @endif">
                                                <label for="current_password" class="control-label">Current Password *</label>
                                                <input type="password" name="current_password" id="current_password" class="form-control">
                                                @if($errors->has('current_password'))<span class="help-block">{{$errors->first('current_password')}}</span> @endif
                                                @if(Session('current_pass_err'))<span class="help-block">{{Session('current_pass_err')}}</span>@endif
                                            </div>
                                            <div class="form-group @if($errors->has('new_password')) has-error @endif">
                                                <label for="new_password" class="control-label">New Password *</label>
                                                <input type="password" name="new_password" id="new_password" class="form-control">
                                                @if($errors->has('new_password'))<span class="help-block">{{$errors->first('new_password')}}</span> @endif
                                            </div>
                                            <div class="form-group @if($errors->has('new_password_confirm')) has-error @endif">
                                                <label for="new_password_confirm" class="control-label">New Password Confirm *</label>
                                                <input type="password" name="new_password_confirm" id="new_password_confirm" class="form-control">
                                                @if($errors->has('new_password_confirm'))<span class="help-block">{{$errors->first('new_password_confirm')}}</span> @endif
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


@stop
