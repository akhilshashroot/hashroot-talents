<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('employee-add', [App\Http\Controllers\Api\EmployeeController::class, 'store'])->name('store');
Route::post('enquiry-add', [App\Http\Controllers\Api\EmployeeController::class, 'enquiryAdd'])->name('enquiryAdd');
Route::post('employee-delete', [App\Http\Controllers\Api\EmployeeController::class, 'employeeDelete'])->name('employeeDelete');
Route::post('mail-test', [App\Http\Controllers\Api\EmployeeController::class, 'MailTest'])->name('employeeDelete');
