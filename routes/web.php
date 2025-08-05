<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Models\Company;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);



// Route::get('/companies/index1', [CompanyController::class, 'view'])->name('companies.index1');


?>



