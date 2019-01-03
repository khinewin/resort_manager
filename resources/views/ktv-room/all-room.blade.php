@extends('layout.backend')

@section('title') KTV Manager | KTV Rooms @stop


@section('header')<i class="fa fa-audio-description"></i> KTV Rooms @stop
@section('small') KTV Manager @stop
@section('level')<i class="fa fa-audio-description"></i> Admin @stop
@section('active') KTV Rooms @stop


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
                    <a class="pull-right" href="{{route('ktv.room.new')}}"><i class="fa fa-plus-circle"></i> Add Room</a>
                </div>
                <!-- /.box-header -->
               <div class="box-body table-responsive">
                   <table id="ktvRoomTable" class="table table-bordered table-hover">
                       <thead>
                       <tr>
                           <th>Room Number</th>
                           <th>Room Type</th>
                           <th>Hour Price</th>
                           <th>Actions</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach($rooms as $room)
                           <tr>
                               <td>{{$room->room_number}}</td>
                               <td>{{$room->room_type}}</td>
                               <td>{{$room->hour_price}}</td>
                               <td class="text-center">
                                   <a href="{{route('ktv.room.edit',['id'=>$room->id])}}"><i class="fa fa-edit"></i></a>

                                   <a href="#" data-toggle="modal" data-target="#{{$room->id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                                   <div class="modal fade" id="{{$room->id}}">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title">Confirm.</h4>
                                               </div>
                                               <form method="post" action="{{route('ktv.room.remove')}}">
                                                   @csrf
                                                   <input type="hidden" name="id" value="{{$room->id}}">
                                                   <div class="modal-body">
                                                       <div class="row">
                                                           <div class="col-sm-4 text-center text-warning">
                                                               <i class="fa fa-warning fa-5x"></i>
                                                           </div>
                                                           <div class="col-sm-8 text-danger">
                                                               The room number <b>{{$room->room_number}}</b> will remove permanently.
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                       <button type="submit" class="btn btn-danger">Delete</button>
                                                   </div>
                                               </form>
                                           </div>
                                           <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                   </div>
                                   <!-- /.modal -->

                               </td>
                           </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>

            </div>
        </div>
    </div>
@stop

