<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\ChangePasswordController;
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

Route::redirect('/', '/login');

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'home', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    // Users
    Route::resource('users', UserController::class);
    Route::delete('/user/destroy', [UserController::class, 'massDestroy'])->name('users.massDestroy');

    // Roles
    Route::resource('roles', RoleController::class);
    Route::delete('/role/destroy', [RoleController::class, 'massDestroy'])->name('roles.massDestroy');

});

Route::group(['prefix' => 'home', 'as' => 'profile.', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password',  [ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class, 'update'])->name('password.update');
    }
});
