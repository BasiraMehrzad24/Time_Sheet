<?php

use App\Http\Controllers\AutoCheckInController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifactionTriggersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectOverviewController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::view('/', 'welcome')->name('welcome');

// Route::middleware(['auth', 'Dashboard'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');

    Route::resource('/projects', ProjectController::class);
    Route::delete('/projects/{project}/users/{user}', [ProjectUserController::class, 'destroy'])
        ->name('projects.users.destroy');
    Route::resource('UserRole', ProjectUserController::class);

    Route::resource('/projects/{project}/reports', DailyReportController::class);

    Route::get('projects/{project}/overview', ProjectOverviewController::class)
        ->name('projects.overview');

    Route::get('projects/{project}/setting', ProjectController::class)
        ->name('projects.setting');

    Route::put('projects/{project}/setting', [ProjectController::class, 'updateAllowedDays'])
        ->name('projects.setting.update');

    Route::delete('projectUser/{id}project{project_id}', [ProjectController::class, 'deletUser'])
        ->name('projectUser');
// });

Route::resource('/profile', UserProfileController::class)
    ->middleware('auth')
    ->except('create', 'show', 'store');

Route::resource('/projects/{project}/auto-check-in', AutoCheckInController::class);

// TODO: remove this route
Route::resource('notifaction', NotifactionTriggersController::class);


// Route::get('empoverview', function () {
//     return view('company/employeeoverview');
// });

