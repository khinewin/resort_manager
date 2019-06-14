@extends('layout.backend')

@section('title')  Food Items @stop


@section('header')<i class="fa fa-list-ol"></i> Food Items @stop
@section('small') Resort Manager @stop
@section('level')<i class="fa fa-list-ol"></i> Resort Manager @stop
@section('active') Food Items @stop


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
                    <h3 class="box-title"><i class="fa fa-list-ol"></i> Food Items</h3>
                    <a class="pull-right" href="{{route('food.new')}}"><i class="fa fa-plus-circle"></i> Add Food Item</a>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Images</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Add By</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach($foods as $f)
                                <tr>
                                    <td class="col-xs-1"><img src="@if($f->image) {{URL::to("foods/$f->image")}} @else {{URL::to('images/foods.jpg')}} @endif" class="img-responsive"></td>
                                    <td>{{$f->item_name}}</td>
                                    <td>{{$f->price}}</td>
                                    <td>{{$f->user->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" style="color: #0b58a2"><i class="fa fa-edit"></i> Edit</a></li>
                                                <li><a href="#" style="color: red"><i class="fa fa-times-circle"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

