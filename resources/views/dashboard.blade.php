@extends('master')
@section('content')

<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    <hr>
    @endif
    <!-- Breadcrumbs-->


  @include('Modal\dashboardmodal')


<!-- Icon Cards-->
<div class="row">
    <div class="mb-3 col-xl-3 col-sm-6">
        <div class="text-white card bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Total Income </div>
                <h3>{{ @$totalincome }} $</h3>
            </div>
            <a class="clearfix text-white card-footer small z-1" href="{{url('income-page')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="mb-3 col-xl-3 col-sm-6">
        <div class="text-white card bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Expense Total</div>

                <h3>{{ $totalall }} $</h3>
            </div>
            <a class="clearfix text-white card-footer small z-1" href="{{url('expense')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>



    <div class="mb-3 col-xl-3 col-sm-6">
        <div class="text-white card bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">Goal</div>
                @foreach(App\Models\GoalModel::get() as $goal)
                <h4>Goal-This-Month</h4>
                <h3>{{$goal->goal}}$</h3>
                @endforeach

            </div>
            <a class="clearfix text-white card-footer small z-1" href="{{url('view_goal_page')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>



    <div class="mb-3 col-xl-3 col-sm-6">
        <div class="text-white card bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"></div>
            </div>
            <a class="clearfix text-white card-footer small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>





<div class="row">
    <div class="mb-3 col-xl-4 col-sm-6">
        <div class="text-white card bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"></div>
                <lebel>Income</lebel>
                <hr style="background-color: rgb(15, 15, 15)">
                @foreach(App\Models\IncomeModel::get() as $income)
                <div class="mr-5">{{ $income->get_category->mother_company }}----{{ $income->children_company }}---
                    {{ $income->income_amount}}
                </div>
                @endforeach
            </div>
            <a class="clearfix text-white card-footer small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
        <a href="#" class="btn btn-primary btn-sm" style="margin-top: 10px;margin-left:140px;margin-button:20px;"
            data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-plus"></i></a>
    </div>




    <div class="mb-3 col-xl-4 col-sm-6">
        <div class="text-white card bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"></div>
                <lebel>Expense</lebel>
                <hr style="background-color: rgb(15, 15, 15)">
                @foreach(App\Models\ExpenseModel::get() as $expense)
                <div class="mr-5">{{ $expense->get_category['mother_company'] }}----{{ $expense->expense_category}}
                    {{ $expense->expense_amount}}
                </div>
                @endforeach

                <p>Salary-Amount-Total ---- {{ $totalesalary }} $</p>
            </div>
            <a class="clearfix text-white card-footer small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
        <a href="#" class="btn btn-primary btn-sm" style="margin-top: 10px;margin-left:140px;margin-button:20px;"
            data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-plus"></i></a>
    </div>


    <div class="mb-3 col-xl-4 col-sm-6">
        <div class="text-white card bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <lebel>Category</lebel>
                <hr style="background-color: rgb(15, 15, 15)">
                @foreach(App\Models\CategoryModel::get() as $cat)
                <div class="mr-5">{{ $cat->mother_company,$cat->id}}
                    ----{{ $cat->children_company,$cat->id }}
                </div>
                @endforeach
            </div>
            <a class="clearfix text-white card-footer small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
        <a href="#" class="btn btn-primary btn-sm" style="margin-top: 10px;margin-left:140px;margin-button:20px;"
            data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></a>
    </div>




    <!-- DataTables Example -->

    @endsection
