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

                        @foreach($salary as $key => $monthly_record)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{$monthly_record->salary_month}}</td>
                            {{--<input type="hidden" name="employee_id[]" value="{{$monthly_record->id}}">--}}
                            {{--<input type="hidden" name="payment[]" value="{{$monthly_record->salary_amount}}">--}}
                            {{--<input type="hidden" name="salary_status[]" value="{{$monthly_record->status}}">--}}


                            <td>
                                <a href="{{url('/single_month_view')}}/{{$monthly_record->salary_month}}"
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
