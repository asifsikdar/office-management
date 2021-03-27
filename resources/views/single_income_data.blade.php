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
    {{-- <form action="{{url('update_month_income')}}" method="POST">
    @csrf --}}
    {{--<input type="date" name="salary_month" style="width:500px;">--}}
    <h3>{{$salary['0']->income_month}}</h3>
    {{-- <input type="hidden" name="mm" value="{{$salary['0']->income_month}}"> --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Income-Month</th>
                        <th>Income-Amount</th>
                        {{-- <th>Date-Time</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>

                @php
                $sl=1;
                @endphp
                <tbody>

                    @foreach($salary as $key => $salary)
                    {{-- @foreach(App\Models\SalaryModel::where('id',$salary->employee_id)->get() as $key => $emp) --}}
                    {{--<input type="hidden" name="emp_id" value="{{$emp->id}}">--}}

                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $salary->income_month}}</td>
                        <td>{{ $salary->income}}</td>
                        {{-- <input type="hidden" name="employee_id[]" value="{{$salary->id}}">
                        <input type="hidden" name="payment[]" value="{{$salary->salary_amount}}">
                        <input type="hidden" name="salary_status[]" value="{{$salary->status}}"> --}}

                        <td>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModal1{{ @$sal->id }}"><i class="fa fa-edit"></i></a>
                        </td>

                        {{-- <td>{{ $emp->income_month }}</td> --}}

                        {{-- if($salary->start_date) --}}
                        {{-- @if($salary->status==1)
                                <td></td>
                                @else($salary->status==0)
                                <td>{{ $salary->updated_at->format('d-m-y') }}</td>
                        @endif --}}
                        {{-- <td>
                                    @if($salary->salary_status==1)
                                    <input type="checkbox" name="status_update[{{$salary->employee_id}}]"
                        id="salary_status" value="update_status">
                        @else
                        <span class="badge badge-success">Payment Paid Successfully!</span>
                        @endif --}}
                        {{--<a href="{{ url('/salary_delete') }}/{{ $emp->id }}" class="btn btn-primary btn-sm"> <i
                            class="fa fa-trash"></i></a>--}}
                        {{--                                    <a href="{{  url('/update_status_mw',$emp->id) }}"
                        class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i></a>--}}
                        {{--<a href="{{url('/view_monthly_record')}}" class="btn btn-primary btn-sm"> <i
                            class="fa fa-eye"></i></a>--}}
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#exampleModal1{{ @$emp->id }}"><i class="fa fa-edit"></i></a>
                        {{-- </td> --}}
                    </tr>
                    {{-- @endforeach --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <button class="btn btn-primary" type="submit">Update</button> --}}
    {{-- </form> --}}
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
