@extends('master')
@section('content')
<div class="container-fluid">

    <!-- Icon Cards-->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add-Expense
    </button>

  @extends('Modal.expensemodal')
{{-- ----------Chart----- --}}
<div id="container"></div>


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
        <form action="{{ url('expense_month') }}" method="POST">
            @csrf
            <input type="date" name="expense_month" style="width:500px;">
            <i class="fas fa-table"></i>
            Data Table</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        {{-- <th>Mother-Company</th> --}}
                        <th>Expense-Category</th>
                        <th>Expense-Amount</th>
                        <th>Expense-Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @php
                $sl=1;
                @endphp
                <tbody>
                    @foreach($expense as $key => $exp)
                    <input style="display:none" type="text" name="employee_id[]" value="{{ $exp->id }}">
                    <input style="display:none" type="text" name="expense_status[]" value="{{ $exp->expense_status }}">
                    <input style="display:none" type="text" name="mother_company[]"
                        value="{{ $exp->get_category['mother_company']}}">
                    <input style="display:none" type="text" name="expense_category[]"
                        value="{{ $exp->expense_category }}">
                    <input style="display:none" type="text" name="expense_amount[]" value="{{ $exp->expense_amount }}">
                    {{-- <input style="display:none" type="text" name="expense_month[]" value="{{ $exp->expense_month }}">
                    --}}
                    <tr>
                        <td>{{ $sl++ }}</td>
                        {{-- <td>{{ $exp->get_category['mother_company'] }}</td> --}}
                        <td>{{  $exp->expense_category}}</td>
                        <td>{{ $exp->expense_amount }}</td>
                        <td>{{ $exp->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ url('expense_delete') }}/{{ $exp->id }}" class="btn btn-primary btn-sm"> <i
                                    class="fa fa-trash"></i></a>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModal1{{ @$exp->id }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('expense_month_page') }}" class="btn btn-primary btn-sm"> <i
                                    class="fa fa-eye"></i></a>
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

@php
$users = App\Models\ExpenseRecordModel::select(DB::raw("sum(expense_amount) as count"))
->whereYear('expense_month', date('Y'))
->groupBy(DB::raw("Month(expense_month)"))
->pluck('count');

$userss = App\Models\ExpenseRecordModel::get();





@endphp



{{-- ---------Chart------- --}}
<script type="text/javascript">
    var users = < ? php echo json_encode($users) ? > ;


    Highcharts.chart('container', {
        title: {
            text: 'Expense Growth, 2021'
        },
        subtitle: {
            text: 'Themefisher'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'Jun', 'July', 'September', 'October']

        },
        yAxis: {
            title: {
                text: 'Number of the Expense'
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
            name: 'Expense-Total',
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
