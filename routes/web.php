<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('user/{user}', [UserController::class, 'update'])
    ->middleware(['auth'])->name('updateUser');

Route::get('user/cv/create', [ProfileController::class, 'create'])
    ->middleware(['auth'])->name('user.cv.create');

Route::get('user/cv/show', [ProfileController::class, 'show'])
    ->middleware(['auth'])->name('user.cv.show');

Route::get('user/cv/edit', [ProfileController::class, 'edit'])
    ->middleware(['auth'])->name('user.cv.edit');

Route::post('user/cv/store', [ProfileController::class, 'store'])
    ->middleware(['auth'])->name('user.cv.store');

Route::put('user/profile/update', [ProfileController::class, 'update'])
    ->middleware(['auth'])->name('user.cv.update');

Route::post('category/create', [CategoryController::class, 'store'])
    ->middleware(['auth'])->name('job.cat.create');

Route::get('user/jobs', [JobController::class, 'index'])
    ->middleware(['auth'])->name('user.jobs');

Route::get('user/jobs/create', [JobController::class, 'create'])
    ->middleware(['auth'])->name('user.job.create');

Route::post('user/jobs/create', [JobController::class, 'store'])
    ->middleware(['auth'])->name('user.job.store');

Route::get('user/applies', [ApplyController::class, 'index'])
    ->middleware(['auth'])->name('user.applies');

Route::post('user/job/apply', [ApplyController::class, 'store'])
    ->middleware(['auth'])->name('user.job.apply');

require __DIR__ . '/auth.php';
