<?php

use App\Http\Controllers\Admin\CoachController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RayonController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SocialFinanceController;
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
Route::name('admin.')->group(function () {
    Route::group(['middleware' => ['auth:admin', 'user-status']], function () {
        // Main
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/account', [UserController::class, 'index'])->name('account');
        Route::post('/account', [UserController::class, 'update'])->name('account.update');
        Route::post('/account/password', [UserController::class, 'password'])->name('account.password');
        Route::get('/notification', [UserController::class, 'notification'])->name('notification');
        Route::post('/notification/read', [UserController::class, 'read'])->name('notification.read');

        // Finance
        Route::resource('finance', FinanceController::class);
        Route::resource('financesocial', SocialFinanceController::class);
        // Rayon
        Route::name('rayon.')->group(function () {
            Route::group(['prefix' => 'rayon'], function () {
                Route::get('/', [RayonController::class, 'index'])->name('index');
                Route::get('/detail/{id}', [RayonController::class, 'detail'])->name('detail');
                Route::get('/add', [RayonController::class, 'add'])->name('add');
                Route::post('/add', [RayonController::class, 'create'])->name('create');
                Route::post('/import', [RayonController::class, 'import'])->name('import');
                Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
                Route::post('/edit/{id}', [RayonController::class, 'update'])->name('update');
                Route::name('coach.')->group(function () {
                    Route::get('/{id}/coach', [CoachController::class, 'index'])->name('index');
                    Route::get('/{id}/coach/add', [CoachController::class, 'add'])->name('add');
                    Route::post('/{id}/coach/add', [CoachController::class, 'create'])->name('create');
                    Route::post('/{id}/coach/import', [CoachController::class, 'import'])->name('import');
                    Route::get('{id}/coach/detail/{coach}', [CoachController::class, 'detail'])->name('detail');
                    Route::post('{id}/coach/edit/{coach}', [CoachController::class, 'update'])->name('update');
                    Route::post('{id}/coach/suspend/{coach}', [CoachController::class, 'suspend'])->name('suspend');
                });
                Route::name('student.')->group(function () {
                    Route::get('/{id}/student', [StudentController::class, 'index'])->name('index');
                    Route::get('/{id}/student/add', [StudentController::class, 'add'])->name('add');
                    Route::post('/{id}/student/add', [StudentController::class, 'create'])->name('create');
                    Route::post('/{id}/student/import', [StudentController::class, 'import'])->name('import');
                    Route::get('{id}/student/detail/{coach}', [StudentController::class, 'detail'])->name('detail');
                    Route::post('{id}/student/edit/{coach}', [StudentController::class, 'update'])->name('update');
                    Route::post('{id}/student/suspend/{coach}', [StudentController::class, 'suspend'])->name('suspend');
                });
            });
        });
    });
});
