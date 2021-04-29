@extends('layouts.master')

<!-- Main content -->
@section('content')
    @include('includes.forms')
    <div class="card card-primary">
        @if(Session::has('success'))
        <h3 class="card-header" style="background: green;""> {{Session::get('success')}}</h3>
@endif
@if(Session::has('error'))

    <h3 class="card-header" style="background: red;"> {{Session::get('error')}}</h3>

@endif
    </div>
    <div class="card-header">
        <h1 class="card-title">Add Permission</h1>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('admin.permissions.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Name">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
    </div>
    <script>
        $(function() {
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Please provide a name of permission",
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    </script>
@endsection
