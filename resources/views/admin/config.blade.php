@extends('layout.backend')

@section('title') KTV Manager >> Config @stop

@section('header')<i class="fa fa-cogs"></i> Config @stop
@section('small') Control Panel @stop
@section('level')<i class="fa fa-cogs"></i> Admin @stop
@section('active') Config @stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(Session('info'))
                <div class="alert alert-success">
                    {{Session('info')}}
                </div>
        @endif



        <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-cogs"></i> Config</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Application Config</div>
                                <div class="panel-body">
                                    <div class="text-center">
                                        <img src='{{URL::to("cfg/$config->logo")}}' class="img-circle" width="100px" alt="User Image">

                                    </div>
                                    <ul class="list-group " style="margin-top: 20px">
                                        <li class="list-group-item">App Title : <b class="text-dark">{{$config->title}}</b></li>
                                        <li class="list-group-item">Address : <b class="text-dark">{{$config->address}}</b></li>
                                        <li class="list-group-item">Contact Phone : <b class="text-dark">{{$config->phone}}</b></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Change Config</div>
                                <div class="panel-body">
                                    <form method="post" action="{{route('update.config')}}" enctype="multipart/form-data">
                                        <div class="form-group @if($errors->has('logo')) has-error @endif">
                                            <label for="logo">App Logo</label>
                                            <input type="file" style="height: auto" name="logo" class="form-control" id="logo">
                                            @if($errors->has('logo')) <span class="help-block">{{$errors->first('logo')}}</span> @endif
                                        </div>
                                        <div class="form-group @if($errors->has('title')) has-error @endif">
                                            <label for="title">App Title</label>
                                            <input value="{{$config->title}}" type="text" name="title" class="form-control" id="title">
                                            @if($errors->has('title')) <span class="help-block">{{$errors->first('title')}}</span> @endif
                                        </div>
                                        <div class="form-group @if($errors->has('address')) has-error @endif">
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control" id="address">{{$config->address}}</textarea>
                                            @if($errors->has('address')) <span class="help-block">{{$errors->first('address')}}</span> @endif
                                        </div>
                                        <div class="form-group @if($errors->has('phone')) has-error @endif">
                                            <label for="phone">Contact Phone</label>
                                            <input value="{{$config->phone}}" type="text" name="phone" class="form-control" id="phone">
                                            @if($errors->has('phone')) <span class="help-block">{{$errors->first('phone')}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn  btn-primary btn-lg">Save</button>
                                        </div>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop