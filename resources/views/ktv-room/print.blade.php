@extends('layout.app')
@section('title') KTV @stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 shadow mt-2" id="forPrint">
                <div class="text-center"><i class="fa fa-headphones-alt fa-4x"></i></div>
                <h2 class="text-center">Family KTV</h2>
                <p class="text-center">PH : 0938373773, 2223333</p>
                <p>Date : {{date('D(d)-m-Y', strtotime($cks->updated_at))}}</p>
                <table class="table">
                    <tr>
                        <td>Room Number</td>
                        <td>Check In</td>
                        <td>Check Out</td>
                        <td>Period</td>
                        <td>Amount</td>
                    </tr>
                    <tr>
                        <td>{{$cks->ktvroom->room_number}}</td>
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