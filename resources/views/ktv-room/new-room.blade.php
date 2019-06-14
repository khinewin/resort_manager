@extends('layout.backend')

@section('title')  Add KTV Room @stop


@section('header')<i class="fa fa-plus-circle"></i> Add KTV Room @stop
@section('small') Resort Manager @stop
@section('level')<i class="fa fa-plus-circle"></i> Resort Manager @stop
@section('active') Add KTV Room @stop


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
                    <h3 class="box-title"><i class="fa fa-plus-circle"></i> Add KTV Room</h3>
                    <a class="pull-right" href="{{route('ktv.room.all')}}"><i class="fa fa-audio-description"></i> Ktv Rooms</a>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                <div class="row">
                 <div class="col-sm-6 col-sm-offset-3">


                <form role="form" method="post" action="{{route('ktv.room.new')}}">
                    <div class="box-body">
                        <div class="form-group @if($errors->has('room_number')) has-error @endif">
                            <label for="room_number" class="control-label">Room Number</label>
                            <input type="text" name="room_number" id="room_number" class="form-control" placeholder="Room Number" >
                            @if($errors->has('room_number')) <span class="help-block">{{$errors->first('room_number')}}</span> @endif
                        </div>

                        <div class="form-group @if($errors->has('room_type')) has-error @endif">
                            <label for="room_type" class="control-label">Room Type</label>
                            <select name="room_type" class="form-control" id="room_type">
                                <option value="">Room Type</option>
                                <option>VIP</option>
                                <option>Standard</option>
                            </select>
                            @if($errors->has('room_type')) <span class="help-block">{{$errors->first('room_type')}}</span> @endif
                        </div>
                        <div class="form-group @if($errors->has('hour_price')) has-error @endif">
                            <label for="hour_price" class="control-label">Hour Price</label>
                            <input type="number" name="hour_price" id="hour_price" class="form-control"  placeholder="Hour Price" >
                            @if($errors->has('hour_price')) <span class="help-block">{{$errors->first('hour_price')}}</span> @endif
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-lg">Create</button>
                    </div>
                    @csrf
                </form>
                 </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop

