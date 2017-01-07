<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function() {
    Route::get('/', 'UserController@index')->name('user_index');
    Route::get('/create', 'UserController@create')->name('create_user');
    Route::post('/create', 'UserController@store')->name('store_user');
    Route::get('/{id}/edit', 'UserController@edit')->name('edit_user');
    Route::get('/{id}', 'UserController@show')->name('show_user');
    Route::put('/{id}/edit', 'UserController@update')->name('update_user');
    Route::get('/{id}/delete', 'UserController@delete')->name('delete_user');
});

Route::group(['prefix' => 'employee', 'middleware' => ['auth']], function() {
    Route::get('/', 'EmployeeController@index')->name('employee_index');
    Route::get('/create', 'EmployeeController@create')->name('create_employee');
    Route::post('/create', 'EmployeeController@store')->name('store_employee');
    Route::get('/{id}/edit', 'EmployeeController@edit')->name('edit_employee');
    Route::get('/{id}', 'EmployeeController@show')->name('show_employee');
    Route::put('/{id}/edit', 'EmployeeController@update')->name('update_employee');
    Route::get('/{id}/delete', 'EmployeeController@delete')->name('delete_employee');
});

Route::group(['prefix' => 'rank', 'middleware' => ['auth']], function() {
    Route::get('/', 'RankController@index')->name('rank_index');
    // Route::get('/create', 'RankController@create')->name('create_rank');
    Route::post('/create', 'RankController@store')->name('store_rank');
    Route::get('/{id}/edit', 'RankController@edit')->name('edit_rank');
    Route::put('/{id}/edit', 'RankController@update')->name('update_rank');
    Route::get('/{id}/delete', 'RankController@delete')->name('delete_rank');
});

Route::group(['prefix' => 'prefix', 'middleware' => ['auth']], function() {
    Route::get('/', 'PrefixController@index')->name('prefix_index');
    // Route::get('/create', 'PrefixController@create')->name('create_title');
    Route::post('/create', 'PrefixController@store')->name('store_prefix');
    Route::get('/{id}/edit', 'PrefixController@edit')->name('edit_title');
    Route::put('/{id}/edit', 'PrefixController@update')->name('update_prefix');
    Route::get('/{id}/delete', 'PrefixController@delete')->name('delete_prefix');
});

Route::group(['prefix' => 'department', 'middleware' => ['auth']], function() {
    Route::get('/', 'DepartmentController@index')->name('department_index');
    // Route::get('/create', 'DepartmentController@create')->name('create_department');
    Route::post('/create', 'DepartmentController@store')->name('store_department');
    Route::get('/{id}/edit', 'DepartmentController@edit')->name('edit_department');
    Route::put('/{id}/edit', 'DepartmentController@update')->name('update_department');
    Route::get('/{id}/delete', 'DepartmentController@delete')->name('delete_department');
});

Route::group(['prefix' => 'paygrade', 'middleware' => ['auth']], function() {
    Route::get('/', 'PaygradeController@index')->name('paygrade_index');
    // Route::get('/create', 'PaygradeController@create')->name('create_paygrade');
    Route::post('/create', 'PaygradeController@store')->name('store_paygrade');
    Route::get('/{id}/edit', 'PaygradeController@edit')->name('edit_paygrade');
    Route::put('/{id}/edit', 'PaygradeController@update')->name('update_paygrade');
    Route::get('/{id}/delete', 'PaygradeController@delete')->name('delete_paygrade');
});

Route::group(['prefix' => 'salarycomponent', 'middleware' => ['auth']], function() {
    Route::get('/', 'SalaryComponentController@index')->name('salarycomponent_index');
    // Route::get('/create', 'SalaryComponentController@create')->name('create_salarycomponent');
    Route::post('/create', 'SalaryComponentController@store')->name('store_salarycomponent');
    Route::get('/{id}/edit', 'SalaryComponentController@edit')->name('edit_salarycomponent');
    Route::put('/{id}/edit', 'SalaryComponentController@update')->name('update_salarycomponent');
    Route::get('/{id}/delete', 'SalaryComponentController@delete')->name('delete_salarycomponent');
});

Route::group(['prefix' => 'employeetype', 'middleware' => ['auth']], function() {
    // Route::get('/', 'EmployeeTypeController@index')->name('employeetype_index');
    // Route::get('/create', 'EmployeeTypeController@create')->name('create_employeetype');
    // Route::post('/create', 'EmployeeTypeController@store')->name('store_employeetype');
    // Route::get('/{id}/edit', 'EmployeeTypeController@edit')->name('edit_employeetype');
    // Route::put('/{id}/edit', 'EmployeeTypeController@update')->name('update_employeetype');
    // Route::get('/{id}/delete', 'EmployeeTypeController@delete')->name('delete_employeetype');
});

Route::group(['prefix' => 'bank', 'middleware' => ['auth']], function() {
    Route::get('/', 'BankController@index')->name('bank_index');
    Route::get('/create', 'BankController@create')->name('create_bank');
    Route::post('/create', 'BankController@store')->name('store_bank');
    Route::get('/{id}/edit', 'BankController@edit')->name('edit_bank');
    Route::put('/{id}/edit', 'BankController@update')->name('update_bank');
    Route::get('/{id}/delete', 'BankController@delete')->name('delete_bank');
});
Route::group(['prefix' => 'employeebankinfo', 'middleware' => ['auth']], function() {
    // Route::get('/', 'EmployeeBankInfoController@index')->name('employeebankinfo_index');
    // Route::get('/create', 'EmployeeBankInfoController@create')->name('create_employeebankinfo');
    Route::post('/create', 'EmployeeBankInfoController@store')->name('store_employeebankinfo');
    // Route::get('/{id}/edit', 'EmployeeBankInfoController@edit')->name('edit_employeebankinfo');
    // Route::put('/{id}/edit', 'EmployeeBankInfoController@update')->name('update_employeebankinfo');
    // Route::get('/{id}/delete', 'EmployeeBankInfoController@delete')->name('delete_employeebankinfo');
});
Route::group(['prefix' => 'pension', 'middleware' => ['auth']], function() {
    Route::get('/', 'PensionController@index')->name('pension_index');
    Route::get('/create', 'PensionController@create')->name('create_pension');
    Route::post('/create', 'PensionController@store')->name('store_pension');
    Route::get('/{id}/edit', 'PensionController@edit')->name('edit_pension');
    Route::put('/{id}/edit', 'PensionController@update')->name('update_pension');
    Route::get('/{id}/delete', 'PensionController@delete')->name('delete_pension');
});
Route::group(['prefix' => 'employeepensioninfo', 'middleware' => ['auth']], function() {
    // Route::get('/', 'EmployeePensionInfoController@index')->name('employeepensioninfo_index');
    // Route::get('/create', 'EmployeePensionInfoController@create')->name('create_employeepensioninfo');
    Route::post('/create', 'EmployeePensionInfoController@store')->name('store_employeepensioninfo');
    // Route::get('/{id}/edit', 'EmployeePensionInfoController@edit')->name('edit_employeepensioninfo');
    // Route::put('/{id}/edit', 'EmployeePensionInfoController@update')->name('update_employeepensioninfo');
    // Route::get('/{id}/delete', 'EmployeePensionInfoController@delete')->name('delete_employeepensioninfo');
});

Route::group(['prefix' => 'employeelevel', 'middleware' => ['auth']], function() {
    Route::get('/', 'EmployeeLevelController@index')->name('employeelevel_index');
    Route::get('/create', 'EmployeeLevelController@create')->name('create_employeelevel');
    Route::post('/create', 'EmployeeLevelController@store')->name('store_employeelevel');
    Route::get('/{id}/edit', 'EmployeeLevelController@edit')->name('edit_employeelevel');
    Route::put('/{id}/edit', 'EmployeeLevelController@update')->name('update_employeelevel');
    Route::get('/{id}/delete', 'EmployeeLevelController@delete')->name('delete_employeelevel');
});

Route::group(['prefix' => 'employeepaygradeinfo', 'middleware' => ['auth']], function() {
    // Route::get('/', 'EmployeePaygradeInfoController@index')->name('employeepaygradeinfo_index');
    // Route::get('/create', 'EmployeePaygradeInfoController@create')->name('create_employeepaygradeinfo');
    Route::post('/create', 'EmployeePaygradeInfoController@store')->name('store_employeepaygradeinfo');
    // Route::get('/{id}/edit', 'EmployeePaygradeInfoController@edit')->name('edit_employeepaygradeinfo');
    // Route::put('/{id}/edit', 'EmployeePaygradeInfoController@update')->name('update_employeepaygradeinfo');
    // Route::get('/{id}/delete', 'EmployeePaygradeInfoController@delete')->name('delete_employeepaygradeinfo');
});

Route::group(['prefix' => 'employeedepartmentinfo', 'middleware' => ['auth']], function() {
    // Route::get('/', 'EmployeeDepartmentInfoController@index')->name('employeedepartmentinfo_index');
    // Route::get('/create', 'EmployeeDepartmentInfoController@create')->name('create_employeedepartmentinfo');
    Route::post('/create', 'EmployeeDepartmentInfoController@store')->name('store_employeedepartmentinfo');
    // Route::get('/{id}/edit', 'EmployeeDepartmentInfoController@edit')->name('edit_employeedepartmentinfo');
    // Route::put('/{id}/edit', 'EmployeeDepartmentInfoController@update')->name('update_employeedepartmentinfo');
    // Route::get('/{id}/delete', 'EmployeeDepartmentInfoController@delete')->name('delete_employeedepartmentinfo');
});

Route::group(['prefix' => 'employeerankinfo', 'middleware' => ['auth']], function() {
    // Route::get('/', 'EmployeeRankInfoController@index')->name('employeerankinfo_index');
    // Route::get('/create', 'EmployeeRankInfoController@create')->name('create_employeerankinfo');
    Route::post('/create', 'EmployeeRankInfoController@store')->name('store_employeerankinfo');
    // Route::get('/{id}/edit', 'EmployeeRankInfoController@edit')->name('edit_employeerankinfo');
    // Route::put('/{id}/edit', 'EmployeeRankInfoController@update')->name('update_employeerankinfo');
    // Route::get('/{id}/delete', 'EmployeeRankInfoController@delete')->name('delete_employeerankinfo');
});

Route::group(['prefix' => 'employeesalarycomponentinfo', 'middleware' => ['auth']], function() {
    // Route::get('/', 'EmployeeSalaryComponentInfoController@index')->name('employeesalarycomponentinfo_index');
    // Route::get('/create', 'EmployeeSalaryComponentInfoController@create')->name('create_employeesalarycomponentinfo');
    Route::post('/create', 'EmployeeSalaryComponentInfoController@store')->name('store_employeesalarycomponentinfo');
    // Route::get('/{id}/edit', 'EmployeeSalaryComponentInfoController@edit')->name('edit_employeesalarycomponentinfo');
    // Route::put('/{id}/edit', 'EmployeeSalaryComponentInfoController@update')->name('update_employeesalarycomponentinfo');
    // Route::get('/{id}/delete', 'EmployeeSalaryComponentInfoController@delete')->name('delete_employeesalarycomponentinfo');
});

Auth::routes();

Route::group(['prefix' => 'appconfig', 'middleware' => ['auth']], function() {
    // Route::get('/', 'AppConfigController@index')->name('appconfig_index');
    // Route::get('/create', 'AppConfigController@create')->name('create_appconfig');
    // Route::post('/create', 'AppConfigController@store')->name('store_appconfig');
    // Route::get('/{id}/edit', 'AppConfigController@edit')->name('edit_appconfig');
    // Route::put('/{id}/edit', 'AppConfigController@update')->name('update_appconfig');
    // Route::get('/{id}/delete', 'AppConfigController@delete')->name('delete_appconfig');
});

Route::group(['prefix' => 'appsetting', 'middleware' => ['auth']], function() {
    Route::get('/', 'AppSettingController@index')->name('appsetting_index');
    Route::get('/create', 'AppSettingController@create')->name('create_appsetting');
    Route::post('/create', 'AppSettingController@store')->name('store_appsetting');
    Route::get('/{id}/edit', 'AppSettingController@edit')->name('edit_appsetting');
    Route::put('/{id}/edit', 'AppSettingController@update')->name('update_appsetting');
    Route::get('/{id}/delete', 'AppSettingController@delete')->name('delete_appsetting');
});

Route::group(['prefix' => 'employee_basic_salary', 'middleware' => ['auth']], function() {
    Route::put('/{id}/edit', 'EmployeeBasicSalaryController@update')->name('update_employee_basic_salary');
});

Route::group(['prefix' => 'payroll', 'middleware' => ['auth']], function() {
    Route::get('/', 'PayrollController@index')->name('payroll_index');
    // Route::get('/create', 'PayrollController@create')->name('create_payroll');
    Route::post('/create', 'PayrollController@store')->name('store_payroll');
    // Route::get('/{id}/edit', 'PayrollController@edit')->name('edit_payroll');
    // Route::put('/{id}/edit', 'PayrollController@update')->name('update_payroll');
    // Route::get('/{id}/delete', 'PayrollController@delete')->name('delete_payroll');
});