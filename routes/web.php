<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



// ---------registration----------
Route::get('/register_page', [App\Http\Controllers\RegController::class,'register_page'])->name('register_page');
Route::POST('/registration', [App\Http\Controllers\RegController::class,'registration'])->name('registration');
// Route::get('/login_get', [App\Http\Controllers\RegController::class,'loginGet'])->name('loginGet');
// Route::POST('/login_post', [App\Http\Controllers\loginController::class,'loginPost'])->name('loginPost');
// Route::group(['middleware' => 'auth'], function() {
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// ---------User Roll-Management-----------
Route::get('/roll_page_view', [App\Http\Controllers\RollController::class, 'roll_page'])->name('roll_page');
Route::get('/user_roll_update/{id}', [App\Http\Controllers\RollController::class, 'RollUpdate'])->name('RollUpdate');
// ---------End User Roll-Management-----------





// ------------Employee-Galary-----------
Route::get('/employee_page', [App\Http\Controllers\EmployeeController::class, 'employee_page'])->name('employee_page');
// ------------End Employee-Galary-----------





// --------------salary-------------
Route::get('/salary_page', [App\Http\Controllers\SalaryController::class, 'salary_page'])->name('salary_page');
Route::POST('/salary_add', [App\Http\Controllers\SalaryController::class, 'add_salary'])->name('add_salary');
Route::get('/update_status/{id}', [App\Http\Controllers\SalaryController::class, 'update_status'])->name('update_status');
Route::get('/status_ending/{id}', [App\Http\Controllers\SalaryController::class, 'status_ending'])->name('status_ending');
Route::get('/salary_delete/{id}', [App\Http\Controllers\SalaryController::class, 'trash'])->name('trash');
Route::POST('/salary_edit/{id}', [App\Http\Controllers\SalaryController::class, 'edit'])->name('edit');
Route::get('/pre_salary', [App\Http\Controllers\SalaryController::class, 'pre_salary'])->name('pre_salary');
Route::POST('/new_month', [App\Http\Controllers\SalaryController::class, 'new_month'])->name('new_month');
Route::get('view_new_month', [App\Http\Controllers\SalaryController::class, 'view_new_month'])->name('view_new_month');
Route::post('/new_month_record', [App\Http\Controllers\SalaryController::class, 'new_month_record'])->name('new_month_record');
Route::get('/view_monthly_record', [App\Http\Controllers\SalaryController::class, 'view_monthly_record'])->name('view_monthly_record');
Route::get('/single_month_view/{salary_month}', [App\Http\Controllers\SalaryController::class, 'SingleMonthView'])->name('SingleMonthView');
Route::post('/update_month_record', [App\Http\Controllers\SalaryController::class, 'UpdateMonthRecord'])->name('UpdateMonthRecord');
Route::get('/update_status_mw/{emp_id}', [App\Http\Controllers\SalaryController::class, 'EmpUpadateSal'])->name('EmpUpadateSal');
// --------------End salary-------------





// -----------Category------------
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'category'])->name('category');
Route::post('/add_category', [App\Http\Controllers\CategoryController::class, 'category_add'])->name('category_add');
Route::get('/delete_category/{id}', [App\Http\Controllers\CategoryController::class, 'delete_category'])->name('delete_category');
Route::post('/category_edite/{id}', [App\Http\Controllers\CategoryController::class, 'categoryEdite'])->name('categoryEdite');
// ----------- End Category------------





// -------------income table route----------
Route::get('/income-page', [App\Http\Controllers\IncomeController::class, 'income_page'])->name('income_page');
Route::POST('/income', [App\Http\Controllers\IncomeController::class, 'add_income'])->name('add_income');
Route::get('/income_trash/{id}', [App\Http\Controllers\IncomeController::class, 'income_trash'])->name('income_trash');
Route::POST('/income_edit/{id}', [App\Http\Controllers\IncomeController::class, 'income_edit'])->name('income_edit');
Route::POST('/income_edit/{id}', [App\Http\Controllers\IncomeController::class, 'income_edit'])->name('income_edit');
Route::POST('/month_income', [App\Http\Controllers\IncomeController::class, 'MonthIncome'])->name('MonthIncome');
Route::get('/view_monthly_income', [App\Http\Controllers\IncomeController::class, 'MonthIncomeView'])->name('MonthIncomeView');
Route::get('/single_monthly_income/{income_month}', [App\Http\Controllers\IncomeController::class, 'MonthIncomeSingle'])->name('MonthIncomeSingle');
Route::POST('/update_month_income/{emp_id}', [App\Http\Controllers\IncomeController::class, 'UpdateMonthIncome'])->name('UpdateMonthIncome');
Route::POST('/donate', [App\Http\Controllers\IncomeController::class, 'Donate'])->name('donate');
Route::get('/donation-page', [App\Http\Controllers\IncomeController::class, 'DonatePage'])->name('DonatePage');
Route::get('/monthly_income_deleted/{income_month}', [App\Http\Controllers\IncomeController::class, 'Monthly_trash'])->name('Monthly_trash');
// -------------End income table route----------




// --------------expense table route-----------
Route::get('/expense', [App\Http\Controllers\ExpenseController::class, 'expense'])->name('expense');
Route::POST('/expense', [App\Http\Controllers\ExpenseController::class, 'add_expense'])->name('add_expense');
Route::get('/expense_delete/{id}', [App\Http\Controllers\ExpenseController::class, 'expense_delete'])->name('expense_delete');
Route::POST('/expense_update/{id}', [App\Http\Controllers\ExpenseController::class, 'expense_update'])->name('expense_update');
Route::POST('/expense_month', [App\Http\Controllers\ExpenseController::class, 'MonthExpense'])->name('MonthExpense');
Route::get('/expense_month_page', [App\Http\Controllers\ExpenseController::class, 'MonthExpensePage'])->name('MonthExpensePage');
Route::get('/expense_month_delete/{expense_month}', [App\Http\Controllers\ExpenseController::class, 'expense_month_delete'])->name('expense_month_delete');
Route::get('/expense_month_single/{expense_month}', [App\Http\Controllers\ExpenseController::class, 'ExpenseMonthSingle'])->name('ExpenseMonthSingle');
// --------------End expense table route-----------




// -------------Goal----------
Route::get('/view_goal_page', [App\Http\Controllers\GoalController::class, 'GoalPage'])->name('GoalPage');
Route::POST('/add_goal', [App\Http\Controllers\GoalController::class, 'GoalAdd'])->name('GoalAdd');
Route::POST('/goal_update/{id}', [App\Http\Controllers\GoalController::class, 'GoalUpdate'])->name('GoalUpdate');
Route::get('/GoalMonthlyView', [App\Http\Controllers\GoalController::class, 'GoalMonthlyView'])->name('GoalMonthlyView');
Route::POST('/GoalMonth_add', [App\Http\Controllers\GoalController::class, 'GoalMonthAdd'])->name('GoalMonthAdd');
// -------------End Goal----------





// ----------Chart js--------
Route::get('/chart', [App\Http\Controllers\ChartController::class,'chart_js'])->name('high_chart');
Route::get('/chart-expense', [App\Http\Controllers\ChartController::class,'chart_expense'])->name('high_chart_expense');
// ----------Chart js--------

// });



