@extends('layout.backend')

@section('title')  Dashboard @stop

    @section('header')<i class="fa fa-dashboard"></i> Dashboard @stop
    @section('small') Resort Manager @stop
    @section('level')<i class="fa fa-dashboard"></i> Resort Manager @stop
    @section('active') dashboard @stop

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

            </div>
        </div>
    </div>

@stop