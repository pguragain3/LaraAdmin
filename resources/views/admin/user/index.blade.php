@extends('layouts.master')

<!-- Main content -->
@section('content')
    @include('includes.tables')
    <hr>
    <a href="{{ route('admin.users.create') }}" style="text-decoration:none;"><button type="button" class="btn btn-block btn-success btn-lg" style="width:auto;">Add User <i class="fas fa-user-plus"></i>

    </button>
</a>
    <hr>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Role</th>
                                    <th class="non-sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if ($data)
                                @foreach ($data as $data)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->role==1 ? "Admin":"User" }}</td>
                                    <td ><a href="">
                                        <div style="display: flex; flex-direction:row;">
                                            <button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
                                        </a><a href=""> <button type="button" class="btn btn-block btn-danger btn-sm">Delete</button></a></td>
                                        </div>
                                        
                                </tr>
                                @endforeach
                            @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- Page specific script -->
    <script>
        $(function() {
            $.noConflict();
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
@endsection
