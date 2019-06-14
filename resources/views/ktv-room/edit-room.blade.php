@extends('layout.backend')

@section('title') Edit KTV Room @stop


@section('header')<i class="fa fa-edit"></i> Edit KTV Room @stop
@section('small') Resort Manager @stop
@section('level')<i class="fa fa-edit"></i> Resort Manager @stop
@section('active') Edit KTV Room @stop


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
                    <h3 class="box-title"><i class="fa fa-edit"></i> Edit KTV Room</h3>
                    <a class="pull-right" href="{{route('ktv.room.all')}}"><i class="fa fa-audio-description"></i> Ktv Rooms</a>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form role="form" method="post" action="{{route('ktv.room.update')}}">
                                <input type="hidden" name="id" value="{{$room->id}}">
                                <div class="box-body">
                                    <div class="form-group @if($errors->has('room_number')) has-error @endif">
                                        <label for="room_number" class="control-label">Room Number</label>
                                        <input value="{{$room->room_number}}" type="text" name="room_number" id="room_number" class="form-control" placeholder="Room Number" >
                                        @if($errors->has('room_number')) <span class="help-block">{{$errors->first('room_number')}}</span> @endif
                                    </div>

                                    <div class="form-group @if($errors->has('room_type')) has-error @endif">
                                        <label for="room_type" class="control-label">Room Type</label>
                                        <select name="room_type" class="form-control" id="room_type">
                                            <option value="">Room Type</option>
                                            <option @if($room->room_type=='VIP') selected @endif>VIP</option>
                                            <option @if($room->room_type=='Standard') selected @endif>Standard</option>
                                        </select>
                                        @if($errors->has('room_type')) <span class="help-block">{{$errors->first('room_type')}}</span> @endif
                                    </div>
                                    <div class="form-group @if($errors->has('hour_price')) has-error @endif">
                                        <label for="hour_price" class="control-label">Hour Price</label>
                                        <input value="{{$room->hour_price}}" type="number" name="hour_price" id="hour_price" class="form-control"  placeholder="Hour Price" >
                                        @if($errors->has('hour_price')) <span class="help-block">{{$errors->first('hour_price')}}</span> @endif
                                    </div>


                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                    <a href="{{route('ktv.room.all')}}" class="btn btn-default btn-lg">Cancel</a>
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

