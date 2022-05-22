<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransitionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('members', MemberController::class);
    Route::resource('transitions', TransitionController::class);
    Route::get('departments/{department}/all-members', [DepartmentController::class, 'allMember'])
        ->name('departments.all_members');
    Route::get('departments/{department}/export-csv', [DepartmentController::class, 'export'])
        ->name('departments.export_csv');
    Route::get('members/{member}/transition-history', [MemberController::class, 'history'])
        ->name('members.history');
    Route::get('members/{member}/export-csv', [MemberController::class, 'export'])
        ->name('members.export_csv');
});

require __DIR__.'/auth.php';
