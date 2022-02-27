<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\socialController;
use App\Http\Controllers\userController;
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

Route::get('/', [homeController::class, 'index']);

Route::middleware('admin_auth')->group(function () {
    Route::view('/dashboard', 'backend/login')->name('login');
    Route::post('/dashboard/login_submit', [userController::class, 'login'])->name('login_submit');
});

Route::group(['middleware' => 'authLogin'], function () {
    //logout user
    Route::get('/logout', function () {
        session()->flush();
        return redirect()->route('login');
    })->name('logout');

    //dashboard
    Route::view('/dashboard/home', 'backend/dashboard')->name('home');

    //signup page
    Route::view('/dashboard/register', 'backend/register')->name('singup');
    //route for get user
    Route::get('/dashboard/user', [userController::class, 'show'])->name('user');
    //route for add user
    Route::post('/dashboard/user', [userController::class, 'index'])->name('signup_submit');
    //route for delete user
    Route::get('/dashboard/user/{id}', [userController::class, 'destroy']);

    //route for Social link
    Route::get('/dashboard/social', [socialController::class, 'index'])->name('social');
    //route for add social link
    Route::post('/dashboard/social', [socialController::class, 'store'])->name('social.store');
    //route for update social link
    Route::patch('/dashboard/social/{id}', [socialController::class, 'update']);
    //route for delete social link
    Route::get('/dashboard/social/{id}', [socialController::class, 'destroy']);

    //route for get portfolio
    Route::get('/dashboard/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
    //route for add portfolio
    Route::post('/dashboard/portfolio', [PortfolioController::class, 'store']);
    //route for update portfolio
    Route::patch('/dashboard/portfolio/{id}', [PortfolioController::class, 'update']);
    //route for delete portfolio
    Route::get('/dashboard/portfolio/{id}', [PortfolioController::class, 'destroy']);

    //route for show skill
    Route::get('/dashboard/skill', [SkillController::class, 'index'])->name('skill');
    //route for add skill
    Route::post('/dashboard/skill', [SkillController::class, 'store']);
    //route for update skill
    Route::patch('/dashboard/skill/{id}', [SkillController::class, 'update']);
    //route for delete skill
    Route::get('/dashboard/skill/{id}', [SkillController::class, 'destroy']);
});
