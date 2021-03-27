@extends('master')
@section('content')
<div class="container-fluid">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add-Salary-Details
    </button>

@include('Modal\salarymodal')
{{-- ----------Chart----- --}}



{{-- -------------endchart-------- --}}

<!-- DataTables Example -->
<div class="mb-3 card" style="margin-top:60px">
    <div class="card-header">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        <hr>
        @endif
        @if(session('delete'))
        <div class="alert alert-danger" role="alert">
            {{session('delete')}}
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
    <form action="{{url('new_month_record')}}" method="POST">
        @csrf
        {{-- <input type="date" name="salary_month" style="width:500px;"> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Employee-Id</th>
                            <th>Joining-Date</th>
                            <th>Employee Name</th>
                            <th>Status</th>
                            <th>Designation</th>
                            <th>Bank-Name</th>
                            <th>Bank-Acount</th>
                            <th>Salary-Amount</th>
                            <th>Bonus</th>
                            <th>Total-Salary</th>
                            <th>Salary-Date</th>
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
                            <td>{{ $salary->empid }}</td>
                            <td style="white-space:nowrap">{{ $salary->joindate }}</td>
                            <input type="hidden" name="employee_id[]" value="{{$salary->id}}">
                            <input type="hidden" name="payment[]" value="{{$salary->salary_amount}}">
                            <input type="hidden" name="salary[]" value="{{$salary->status}}">
                            <td>{{ $salary->name }}</td>
                            <td>

                                @if($salary->status==1)
                                <a class="btn btn-primary btn-sm">Pending</a>
                                @else
                                <a class="btn btn-primary btn-sm">Paid</a>
                                @endif

                            </td>


                            <td>{{ $salary->designation }}</td>
                            <td>{{ $salary->bankname }}</td>
                            <td style="white-space:nowrap">{{ $salary->bankdetails }}</td>
                            <td>{{ $salary->salary_amount }}</td>
                            <td>{{ $salary->bonus }}</td>
                            <td>
                                @if ($salary->status==0)
                                {{ $salary->salary_amount+$salary->bonus }}
                                @else($salary->status==1)

                                @endif
                            </td>
                            <td style="white-space:nowrap">

                                @if($salary->status ==1)

                                @else($salary->status ==0)
                                {{ $salary->created_at->format('d-m-Y') }}
                                @endif
                            </td>

                            {{-- if($salary->start_date) --}}
                            {{-- @if($salary->status==1)
                    <td></td>
                    @else($salary->status==0)
                    <td>{{ $salary->updated_at->format('d-m-y') }}</td>
                            @endif --}}
                            <td style="white-space:nowrap">
                                @if($salary->status ==0)

                                @else($salary->status ==1)
                                <a href="{{  url('/update_status',$salary->id) }}" class="btn btn-primary btn-sm"> <i
                                        class="fa fa-plus"></i></a>
                                @endif
                                <a href="{{ url('/salary_delete') }}/{{ $salary->id }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-trash"></i></a>
                                {{-- <a href="{{ url('status_ending',$salary->id) }}" class="btn btn-primary btn-sm"> <i
                                    class="fa fa-minus"></i></a> --}}
                                <a href="{{url('/view_monthly_record')}}" class="btn btn-primary btn-sm"> <i
                                        class="fa fa-eye"></i></a>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal1{{ @$salary->id }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <button class="btn btn-primary" type="submit">Submit</button> --}}
    </form>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
