@extends('layouts.master')

<!-- Main content -->
@section('content')
    @include('includes.forms')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ $data[0]->name }}</h3>

                        <p class="text-muted text-center">{{ $data[0]->role }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $data[0]->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="float-right">{{ $data[0]->role }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>User Since</b> <a class="float-right"> {{ $data[0]->created_at }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#update_profile" data-toggle="tab">Update
                                    Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change
                                    Password</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="change_password">
                                <!-- Change Password -->
                                <form class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputCurrentPassword" class="col-sm-2 col-form-label">Current Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputCurrentPassword" name="current" placeholder="Current Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputNewPassword" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputNewPassword" name="new" placeholder="New Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputConfirmPassword" name="confirm" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane active" id="update_profile">
                                <form class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="name" value={{ $data[0]->name }} id="inputName" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email"  value={{ $data[0]->email }} id="inputEmail" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

@endsection
