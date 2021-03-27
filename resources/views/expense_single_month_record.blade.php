@extends('master')
@section('content')
<div class="container-fluid">

    <!-- Icon Cards-->

    <!-- Button trigger modal -->



    <!-- Modal 2-->
    @foreach($salary as $key => $sal)
    <div class="modal fade" id="exampleModal1{{ @$sal->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Edite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('update_month_income',$sal->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <lebel>Category</lebel>
                        <input type="date" name="income_month" value="{{ @$sal->income_month }}" placeholder="Cetegory"
                            style="width:90%"><br><br>
                        <input type="text" name="income" value="{{ @$sal->income }}" placeholder="Cetegory"
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

@endforeach
{{-- <br><br> --}}
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


    </div>
    <h3>{{$salary['0']->expense_month}}</h3>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Mother-Company</th>
                        <th>Expense-Category</th>
                        <th>Expense-Amount</th>
                        <th>Expense-Month</th>
                        {{-- <th>Date-Time</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>

                @php
                $sl=1;
                @endphp
                <tbody>

                    @foreach($salary as $key => $salary)

                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $salary->mother_company}}</td>
                        <td>{{ $salary->expense_category}}</td>
                        <td>{{ $salary->expense_amount}}</td>
                        <td>{{ $salary->expense_month}}</td>


                        <td>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModal1{{ @$sal->id }}"><i class="fa fa-edit"></i></a>
                        </td>

                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#exampleModal1{{ @$emp->id }}"><i class="fa fa-edit"></i></a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>



<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
