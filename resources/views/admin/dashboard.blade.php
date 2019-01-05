@extends('layout.backend')

@section('title') KTV Manager >> Dashboard @stop

    @section('header')<i class="fa fa-dashboard"></i> Dashboard @stop
    @section('small') Control Panel @stop
    @section('level')<i class="fa fa-dashboard"></i> Admin @stop
    @section('active') dashboard @stop

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
                    <h3 class="box-title"><i class="fa fa-audio-description"></i> KTV Rooms</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @foreach($ktv_rooms as $k_room)
                           <div class="col-md-2 col-sm-2 col-xs-6">
                               <div class="thumbnail text-center @if($k_room->status==null) bg-green @else bg-red @endif">
                                   <i class="fa fa-music fa-2x"></i>
                                   <span class="text-center text-bold" style="font-size: 20px">{{$k_room->room_number}}</span>
                                   <div style="margin-top: 5px; margin-bottom: 10px">
                                       {{$k_room->room_type}} <span class="badge">{{$k_room->hour_price}} MMK</span>
                                   </div>
                                   @if(!$k_room->status)
                                   <a href="{{route('ktv.check.in',['id'=>$k_room->id])}}" class="btn btn-default btn-sm btn-block">Check In</a>
                                   @else
                                   <a id="reloadMe" target="_blank" href="{{route('ktv.check.out',['id'=>$k_room->id])}}" class="btn btn-default btn-sm btn-block">Check Out</a>
                                   @endif
                               </div>
                           </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop