@extends('master')
@section('content')
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
    </div>
    <form action="#" method="POST">
        @csrf
        {{--<input type="date" name="salary_month" style="width:500px;">--}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date/Month</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @php
                    $sl=1;
                    @endphp
                    <tbody>

                        @foreach($salary as $key=> $monthly_income)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $monthly_income->income_month }}</td>
                            <td>

                                <a href="{{url('/monthly_income_deleted')}}/{{$monthly_income->income_month}}"
                                    class="btn btn-primary btn-sm"> <i class="fa fa-trash"></i></a>
                                <a href="{{url('/single_monthly_income')}}/{{$monthly_income->income_month}}"
                                    class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
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
