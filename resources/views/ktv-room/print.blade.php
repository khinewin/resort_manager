@extends('layout.app')
@section('title') Print @stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 shadow mt-2" id="forPrint">
                <div class="text-center">
                    <img src='{{URL::to("cfg/$config->logo")}}' class="img-responsive" width="100px">
                </div>
                <h2 class="text-center">{{$config->title}}</h2>
                <p class="text-center"> {{$config->address}}</p>
                <p class="text-center">PH : {{$config->phone}}</p>
                <p>Date : {{date('D(d)-m-Y', strtotime($cks->updated_at))}}</p>
                <table class="table">
                    <tr>
                        <td>Room Number / Type</td>
                        <td>Check In</td>
                        <td>Check Out</td>
                        <td>Period</td>
                        <td>Amount</td>
                    </tr>
                    <tr>
                        <td>{{$cks->ktvroom->room_number}} / {{$cks->ktvroom->room_type}}</td>
                        <td>{{date('h:i A', strtotime($cks->check_in))}}</td>
                        <td>{{date('h:i A', strtotime($cks->check_out))}}</td>
                        <td>
                            <?php
                            $ck_in=strtotime($cks->check_in);
                            $ck_out=strtotime($cks->check_out);
                            $t=$ck_out-$ck_in;
                            $m=floor($t / (60));

                            ?>
                            {{$m}} Minutes

                        </td>
                        <td>{{$cks->amount}} MMK</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <button id="btnPrint" type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>

            </div>
        </div>
    </div>

@stop