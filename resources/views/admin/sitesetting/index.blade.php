@extends('layouts.master')

<!-- Main content -->
@section('content')
    @include('includes.forms')
    @include('includes.modals')

    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Update Site Settings</h1>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('admin.sitesettings.update') }}">
            @csrf
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">App Name</label>
                        <input type="text" name="site_name" value="{{ $sitesetting->site_name ?? '' }}" class="form-control"
                             placeholder="Website Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">App Name</label>
                        <input type="text" name="company_name" value="{{ $sitesetting->company_name ?? '' }}" class="form-control"
                             placeholder="Company Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" name="location" value="{{ $sitesetting->location ?? '' }}" class="form-control"
                             placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" value="{{ $sitesetting->email ?? '' }}" class="form-control"
                             placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="number" name="contact_number" value="{{ $sitesetting->contact_number ?? '' }}" class="form-control"
                             placeholder="Phone Number" required>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>
@endsection
