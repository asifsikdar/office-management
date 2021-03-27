@extends('master')
@section('content')
<div class="container-fluid">

    <!-- Icon Cards-->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add-Goal
    </button>

    @include('Modal.goalmodal')
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

            <form action="{{ url('GoalMonth_add') }}" method="POST">
                @csrf
                <i class="fas fa-table"></i>
                Data Table</div>
        <div class="card-body">
            <input type="date" name="goaldatemonthly" style="width:300px">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Total-Income</th>
                            <th>Goal-This-Month</th>
                            <th>Achived</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @php
                    $sl=1;


                    @endphp

                    <tbody>
                        {{--  @foreach($data as $key => $incomedata)  --}}
                        @foreach($goalpage as $key => $goal)
                        <input style="display:none" type="text" name="goal" value="{{ $goal->goal }}">
                        <input style="display:none" type="text" name="achived" value="{{ $goal->id }}">





                        {{-- @endforeach --}}

                        @php

                        $percentage = $totalincome;
                        $totalWidth = $goal->goal;


                        $percentage = ( $percentage / $totalWidth ) * 100;
                        @endphp
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ @$totalincome }}$</td>
                            <td>{{ $goal->goal }}$</td>
                            <td>{{@$percentage}}%</td>
                            <td>
                                {{-- <a href="{{ url('goal_delete') }}/{{ $goal->id }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-trash"></i></a> --}}
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal1{{ @$goal->id }}"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('GoalMonthlyView') }}" class="btn btn-primary btn-sm"> <i
                                        class="fa fa-eye"></i></a>
                            </td>
                        </tr>

                        @endforeach
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
