@extends('layout.backend')

@section('title') KTV Manager | Reports @stop


@section('header')<i class="fa fa-chart-area"></i> Reports @stop
@section('small') KTV Manager @stop
@section('level')<i class="fa fa-chart-area"></i> Admin @stop
@section('active') Reports @stop


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
                    <h3 class="box-title"><i class="fa fa-chart-area"></i> Reports</h3>
                    <span class="text-bold">
                        @if($today)
                        Date : {{date('D(d)-m-Y',strtotime($today))}}
                            @endif
                        @if($month)
                            Month : {{date('M(m)-Y', strtotime($month))}}
                            @endif
                    </span>

                    <dev class="pull-right">
                        <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </dev>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <form id="filterDate" method="get" action="{{route('filter.date')}}">
                                <div class="form-group">
                                    <label for="d"><i class="fa fa-calendar"></i> Filter by date</label>
                                    <input type="date" id="d" name="d" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form id="filterMonth" method="get" action="{{route('filter.month')}}">
                                <div class="form-group">
                                    <label for="m"><i class="fa fa-calendar"></i> Filter by Month</label>
                                    <input type="month" id="m" name="m" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <?php $totalAmount=0;?>
                            @foreach($rps as $rp)
                                <?php $totalAmount += $rp->amount; ?>
                            @endforeach
                                <label class="control-label"><i class="fa fa-chart-pie"></i> Total Amount</label>
                                <input type="text" value="{{$totalAmount}}" disabled class="form-control">
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tr class="btn-default text-bold">

                            <td>Room Number / Type</td>
                            <td>Check In</td>
                            <td>Check Out</td>
                            <td>Period</td>
                            <td>Amount</td>
                            <td>Status</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($rps as $rp)
                            <tr>

                                <td>{{$rp->ktvroom->room_number}} / {{$rp->ktvroom->room_type}}</td>
                                <td>{{date('D(d)-m-Y, h:i A', strtotime($rp->check_in))}}</td>
                                <td>
                                    @if($rp->check_out==null)
                                        <i class="fa fa-headphones text-danger"></i>
                                        @else
                                    {{date('D(d)-m-Y, h:i A', strtotime($rp->check_out))}}
                                        @endif
                                </td>
                                <td>
                                    @if($rp->check_out==null)
                                        <i class="fa fa-headphones text-danger"></i>
                                    @else
                                        <?php
                                        $ck_in=strtotime($rp->check_in);
                                        $ck_out=strtotime($rp->check_out);
                                        $t=$ck_out-$ck_in;
                                        $m=floor($t / (60));

                                        ?>
                                        {{$m}} Minutes
                                    @endif

                                </td>

                                <td>
                                    @if($rp->check_out==null)
                                        <i class="fa fa-headphones text-danger"></i>
                                    @else
                                        {{$rp->amount}}
                                    @endif

                                </td>
                                <td>
                                    @if(!$rp->status)
                                        <span class="text-danger">Check In</span>
                                        @else
                                        <span class="text-success">Finish</span>
                                    @endif
                                </td>
                                <td>
                                    @if($rp->check_out==null)
                                        <i class="fa fa-headphones text-danger"></i>
                                    @else
                                        <a target="_blank" href="print/{{$rp->id}}"><i class="fa fa-print"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
@stop

