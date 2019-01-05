@extends('layout.backend')

@section('title') KTV Manager >> Users @stop


@section('header')<i class="fa fa-users"></i> Users @stop
@section('small') KTV Manager @stop
@section('level') <a href="#"><i class="fa fa-users"></i> Admin </a> @stop
@section('active') Users @stop

    @section('content')

            <div class="row">
                <div class="col-md-12">
                    @if(Session('info'))
                        <div class="alert alert-success">
                            {{Session('info')}}
                        </div>
                    @endif
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-users"></i> Users</h3>
                            <a class="pull-right" href="{{route('user.new')}}"><i class="fa fa-user-plus"></i> Add User</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="usersTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Member Since</th>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="tel:{{$user->phone}}">{{$user->phone}}</a></td>
                                        <td>{{$user->roles()->pluck('name')->implode(' ')}}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td class="text-center">
                                            <a href="{{route('user.edit',['id'=>$user->id])}}"><i class="fa fa-edit"></i></a>

                                            <a href="#" data-toggle="modal" data-target="#{{$user->id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                                            <div class="modal fade" id="{{$user->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Confirm.</h4>
                                                        </div>
                                                        <form method="post" action="{{route('user.remove')}}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$user->id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 text-center text-warning">
                                                                    <i class="fa fa-warning fa-5x"></i>
                                                                </div>
                                                                <div class="col-sm-8 text-danger">
                                                                    The user account name <b>{{$user->name}}</b> will remove permanently.
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
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->



        @stop
