@extends('layout.backend')

@section('title') Add VAS @stop


@section('header')<i class="fa fa-plus-circle"></i> Add VAS @stop
@section('small') Resort Manager @stop
@section('level')<i class="fa fa-plus-circle"></i> Resort Manager @stop
@section('active') Add VAS @stop


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
                    <h3 class="box-title"><i class="fa fa-plus-circle"></i> Add VAS</h3>
                    <a class="pull-right" href="{{route('ktv.room.control')}}"><i class="fa fa-volume-control-phone"></i> Room Control</a>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="row" style="margin-bottom: 40px">
                        <div class="col-sm-4">
                            Room Number : {{$room->room_number}}
                        </div>
                        <div class="col-sm-4">
                            Room Type : {{$room->room_type}}
                        </div>
                        <div class="col-sm-4">
                            Status : @if($room->status) <span class="text-danger">Checkin</span> @else <span class="text-primary">Free</span> @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Add Items</div>
                                <div class="panel-body">

                                    @if(count($sale_items) > 0)
                                        <table class="table">
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                            </tr>
                                            @foreach($sale_items as $item)
                                                <tr >
                                                    <td>
                                                        <a href="{{route('remove.one',['id'=>$item->id])}}" class="text-danger"><i class="fa fa-times-circle"></i></a>
                                                        {{$item->item_name}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>
                                                        <a href="{{route('decrease.one',['id'=>$item->id])}}"><i class="fa fa-minus-circle"></i></a>
                                                        {{$item->qty}}
                                                        <a href="{{route('increase.one',['id'=>$item->id])}}"><i class="fa fa-plus-circle"></i></a>
                                                    </td>
                                                    <td>{{$item->amount}}</td>

                                                </tr>
                                            @endforeach

                                        </table>


                                    @elseif(Session::has('vas_cart'))
                                        <table class="table">
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                            </tr>
                                            @foreach(Session::get('vas_cart')->items as $item)
                                                <tr >
                                                    <td>
                                                        <a href="{{route('remove.item',['id'=>$item['item']['id']])}}" class="text-danger"><i class="fa fa-times-circle"></i></a>
                                                        {{$item['item']['item_name']}}</td>
                                                    <td>{{$item['item']['price']}}</td>
                                                    <td>
                                                        <a href="{{route('decrease.cart',['id'=>$item['item']['id']])}}"><i class="fa fa-minus-circle"></i></a>
                                                        {{$item['qty']}}
                                                        <a href="{{route('increase.cart',['id'=>$item['item']['id']])}}"><i class="fa fa-plus-circle"></i></a>
                                                    </td>
                                                    <td>{{$item['amount']}}</td>

                                                </tr>
                                                @endforeach

                                        </table>
                                        <a href="{{route('checkout.vas', ['room_id'=>$room->id])}}" class="btn btn-primary">Save</a>
                                        @else
                                            <p class="text-info text-center"><i class="fa fa-warning"></i> No vas items.</p>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Foods</div>
                                <div class="panel-body table-responsive">
                                    <table class="table" id="vasFoodTable">
                                        <thead>
                                        <tr>
                                            <th>Add</th>
                                            <th>Images</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        @foreach($foods as $f)

                                             <tr>
                                                <td class="text-center"><a href="{{route('add.cart',['id'=>$f->id])}}" style="display: block"><i class="fa fa-plus-square"></i></a></td>
                                                <td class="col-xs-1"><img src="@if($f->image) {{URL::to("foods/$f->image")}} @else {{URL::to('foods/foods.jpg')}} @endif" class="img-responsive"></td>
                                                <td>{{$f->item_name}}</td>
                                                <td>{{$f->price}}</td>
                                             </tr>

                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

