@extends('master')
@section('content')
<div class="container-fluid">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add-Category
    </button>

   @extends('Modal\CategoryModal')
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
        Data Table</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Mother-Company</th>
                        <th>Children-Company</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @php
                $sl=1;
                @endphp
                <tbody>
                    @foreach($category as $key => $cat)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $cat->mother_company }}</td>
                        <td>{{ $cat->children_company }}</td>
                        <td>
                            <a href="{{ url('delete_category')}}/{{$cat->id}}" class="btn btn-primary btn-sm"> <i
                                    class="fa fa-trash"></i></a>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModal1{{ @$cat->id }}"><i class="fa fa-edit"></i></a>
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
