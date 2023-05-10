<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Social\SocialController;
use App\Http\Controllers\Admin\NewsController as NewsAdminController;
use App\Http\Controllers\Admin\UserController as UserAdminController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ContactController as ContactAdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryAdminController;
use App\Http\Controllers\Admin\FeedbackController as FeedbackAdminController;
use App\Http\Controllers\Admin\NewsSourcesDataController as NewsSourcesDataAdminController;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
    Route::get('/account', AccountController::class)->name('account');


    Route::prefix('admin' ,['middleware' => 'is.admin'])->group(function () {
        Route::name('admin.')->group(function () {

            Route::resource('news', NewsAdminController::class);
            Route::resource('category', CategoryAdminController::class);
            Route::resource('contact', ContactAdminController::class);
            Route::resource('feedback', FeedbackAdminController::class);
            Route::resource('newsSources', NewsSourcesDataAdminController::class);
            Route::resource('user', UserAdminController::class);

            Route::get('/parser', ParserController::class)->name('parser');

        });
    });
});



Route::prefix('')->group(function () {
    Route::get('/index', [NewsController::class, 'index'])->name('index');

    Route::get('/news', [NewsController::class, 'news'])->name('news');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');

    Route::get('/news/category', [CategoryController::class, 'index'])->name('news.category');

    Route::get('/news/category/{id}/show', [NewsController::class, 'showCategory'])->where('id', '\d+')->name('news.showCategory');

    Route::resource('contacts', ContactController::class);

    Route::resource('feedback', FeedbackController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('', ['middleware' => 'guest'])->group(function () {

    Route::get('/auth/redirect/{driver}', [SocialController::class, 'redirect'])->where('driver', '\w+')->name('socail.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialController::class, 'callback'])->where('driver', '\w+');
});
