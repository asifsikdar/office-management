@extends('master')
@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->


    <!-- Icon Cards-->

    <!-- Button trigger modal -->
    {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Add-Category
    </button>  --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('category_add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <lebel>Category</lebel>
                        <select name="mother_company" style="form-control">
                            <option>Themefisher</option>
                        </select>
                        <select name="children_company" style="form-control">
                            <option>Themefisher</option>
                            <option>Gethugo theme</option>
                            <option>Sitepines</option>
                        </select>
                        {{--  <input type="text" name="category" value=""placeholder="Cetegory"style="width:90%">  --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2-->
{{--  @foreach($category as $key => $cat)
    <div class="modal fade" id="exampleModal1{{ @$cat->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Edite</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('categoryEdite',$cat->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <lebel>Category</lebel>
                <input type="text" name="category" value="{{ @$cat->category }}" placeholder="Cetegory"
                    style="width:90%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>

@endforeach --}}
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
                        <th>Employee-Name</th>
                        <th>Employee-Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @php
                $sl=1;
                @endphp
                <tbody>
                    {{-- @foreach($emp as $key => $employee) --}}
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#exampleModal1{{ @$cat->id }}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
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
