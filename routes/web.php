<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\CustomSearchController;

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
    return view('stakefield.stakefield');
});
Route::get('/custom-search', [App\Http\Controllers\CustomSearchController::class, 'index'])->name('customsearch.index');
Route::post('enquiry-form', [App\Http\Controllers\EnquiryController::class, 'store'])->name('store');
Route::post('contact-us', [App\Http\Controllers\ContactUsController::class, 'store'])->name('contact.store');

// Auth::routes();

// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('employee', EmployeeController::class);
// Route::get('/enquiry-list', [App\Http\Controllers\Admin\EnquiryController::class, 'index'])->name('enquirylist');

// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/changePassword',[App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
//     Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
// });
