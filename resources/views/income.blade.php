@extends('master')
@section('content')

<div class="container-fluid">

    <!-- Icon Cards-->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add-Income
    </button>


    @extends('Modal\incomemodal')
    {{-- --------chart------ --}}

    <div id="container"></div>

    {{-- ----------endchart----- --}}

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
                            <th>Children-Company</th>
                            <th>Income-Amount</th>
                            <th>Income-Date</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    @php
                    $sl=1;
                    @endphp
                    <tbody>
                        @foreach($income as $key => $inc)

                        <input style="display:none" type="text" name="employee_id[]" value="{{ $inc->id }}">

                        <input style="display:none" type="text" name="income_status[]" value="{{ $inc->status }}">
                        <input style="display:none" type="text" name="income[]" value="{{ $inc->income_amount }}">
                        <tr>

                            <td>{{ $sl++ }}</td>
                            <td>{{$inc->children_company}}</td>
                            <td>{{ $inc->income_amount}}</td>
                            <td>{{ $inc->created_at->format('d-m-Y')}}</td>

                            <td>

                                <a href="{{ url('income_trash') }}/{{ $inc->id }}" class="btn btn-primary btn-sm"> <i
                                        class="fa fa-trash"></i></a>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal1{{ @$inc->id }}"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('view_monthly_income') }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-eye"></i></a>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>  --}}
    </div>
    <button class="btn btn-primary" type="submit" style="form-control">Submit</button>
    </form>
</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@php
$users = App\Models\IncomeMonthlyReport::select(DB::raw("sum(income) as count"))
->whereYear('created_at', date('Y'))
->groupBy(DB::raw("Month(created_at)"))
->pluck('count');




@endphp

{{-- chart --}}


<script type="text/javascript">
    var users = < ? php echo json_encode($users) ? > ;


    Highcharts.chart('container', {
        title: {
            text: 'Income Growth, 2021'
        },
        subtitle: {
            text: 'Themefisher'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'Jun', 'July', 'September', 'October']


        },
        yAxis: {
            title: {
                text: 'Number of the Income'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Income-Total',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>


@endsection
