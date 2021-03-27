@extends('master')
@section('content')

<div class="container-fluid">

    <!-- Icon Cards-->


 @include('Modal.donationmodal')


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
        <form action="{{route('MonthIncome')}}" method="POST">
            @csrf
            <input type="date" name="income_month" style="width:500px;">

            <i class="fas fa-table"></i>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        {{-- <th>Mother-Company</th> --}}
                        <th>Children-Company</th>
                        <th>Income-Amount</th>
                        <th>Donation In</th>
                        <th>Donation Out</th>
                        <th>Action</th>
                    </tr>

                </thead>
                @php
                $sl=1;
                $donation_in=0;
                @endphp
                <tbody>
                    @foreach($income as $key => $inc)

                    @php

                    $donation_in = App\Models\Donate::where('donation_in_id',$inc->id)->get();
                    $donation_out = App\Models\Donate::where('donation_out_id',$inc->id)->get();

                    @endphp

                    <input style="display:none" type="text" name="employee_id[]" value="{{ $inc->id }}">

                    <input style="display:none" type="text" name="income_status[]" value="{{ $inc->status }}">
                    <input style="display:none" type="text" name="income[]" value="{{ $inc->income_amount }}">
                    <tr>

                        <td>{{ $sl++ }}</td>
                        <td>{{ $inc->children_company }}</td>
                        <td>{{ $inc->income_amount}}$</td>
                        <td>@foreach($donation_in as $all) ${{ @$all->donation_in_ammount }}+ @endforeach</td>
                        <td>@foreach($donation_out as $all_int) ${{ @$all_int->donation_out_ammount }}- @endforeach</td>

                        <td style="text-align:center">
                            <a href="#" data-toggle="modal" data-target="#exampleModal2{{ $inc->id }}"
                                class="btn btn-primary btn-sm"><i class="fas fa-donate"></i></a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<button class="btn btn-primary" type="submit" style="form-control">Submit</button>
</form>
</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
