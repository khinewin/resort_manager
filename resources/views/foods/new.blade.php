@extends('layout.backend')

@section('title')  Add Food Item @stop


@section('header')<i class="fa fa-plus-circle"></i> Add Food Item @stop
@section('small') Resort Manager @stop
@section('level')<i class="fa fa-plus-circle"></i> Resort Manager @stop
@section('active') Add Food Item @stop


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
                    <h3 class="box-title"><i class="fa fa-plus-circle"></i> Add Food Item</h3>
                    <a class="pull-right" href="{{route('food.items')}}"><i class="fa fa-list-ol"></i> Food Items</a>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form method="post" action="{{route('food.new')}}" enctype="multipart/form-data">
                                <div class="form-group @if($errors->has('image')) has-error @endif">
                                    <label for="image">Food Image</label>
                                    <input type="file" name="image" id="image" >
                                    @if($errors->has('image')) <span class="help-block">{{$errors->first('image')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('item_name')) has-error @endif">
                                    <label for="item_name">Item Name</label>
                                    <input type="text" name="item_name" id="item_name" class="form-control">
                                    @if($errors->has('item_name')) <span class="help-block">{{$errors->first('item_name')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('price')) has-error @endif">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control">
                                    @if($errors->has('price')) <span class="help-block">{{$errors->first('price')}}</span> @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">Add</button>
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

