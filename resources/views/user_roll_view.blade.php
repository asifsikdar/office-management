@extends('master')
@section('content')
<div class="container-fluid">


    <!-- Modal -->


    <!-- Modal 2-->

    <!-- Area Chart Example-->


    <!-- DataTables Example -->
    <div class="mb-3 card" style="margin-top:60px">
        <div class="card-header">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            <hr>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('delete'))
            <div class="alert alert-danger" role="alert">
                {{session('delete')}}
            </div>
            <hr>
            @endif
            <i class="fas fa-table"></i>
            User Table</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User-Name</th>
                            <th>User-Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @php
                    $sl=1;
                    @endphp
                    <tbody>
                        @foreach($user as $key => $userdata)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $userdata->name }}</td>
                            <td>{{ $userdata->email }}</td>
                            <td>
                                @if($userdata->status==2)
                                <button type="button" class="btn btn-primary btn-sm">Admin</button>

                                @else($userdata->status==1)
                                <button type="button" class="btn btn-info btn-sm">User</button>
                                @endif


                            </td>
                            <td>
                                @if($userdata->status==2)

                                @else
                                <a href="{{ url('user_roll_update',$userdata->id) }}" class="btn btn-primary btn-sm"> <i
                                        class="fa fa-plus"></i></a>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
