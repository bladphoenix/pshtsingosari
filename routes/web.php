<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\StudentController;
use App\Http\Controllers\User\UserController;

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
})->name('welcome');

Auth::routes();

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin']);

Route::group(['middleware' => ['auth', 'user-status', 'role:Admin|Rayon|User|Pelatih']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/account', [UserController::class, 'index'])->name('account');
    Route::post('/account', [UserController::class, 'update'])->name('account.update');
    Route::post('/account/password', [UserController::class, 'password'])->name('account.password');
    Route::get('/notification', [UserController::class, 'notification'])->name('notification');
    Route::post('/notification/read', [UserController::class, 'read'])->name('notification.read');

    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/add', [StudentController::class, 'add'])->name('student.add');
    Route::post('/student/add', [StudentController::class, 'create'])->name('student.create');
    Route::get('/rayon/register', [HomeController::class, 'register'])->name('rayon.register')->middleware('role:User');
    Route::post('/rayon/register', [HomeController::class, 'registerSubmit'])->name('rayon.registersubmit')->middleware('role:User');
    Route::get('/rayon/statement', [HomeController::class, 'statement'])->name('rayon.statement')->middleware('role:User');
    Route::post('/rayon/statement', [HomeController::class, 'statementSubmit'])->name('rayon.statement')->middleware('role:User');
});
