<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::namespace('App\Http\Controllers\User')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/destinations/{location}/{tour:slug}', 'TourController@show')->name('tour.detail');
    Route::get('/search-tour', 'TourController@searchTour')->name('tour.search');
    Route::get('/search', 'TourController@search')->name('search.tour');
    Route::get('/filter', 'TourController@filter')->name('filter.tour');

    Route::resource('destinations', 'TourController');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/filldata/{tour:slug}', 'BookTourController@store')->name('tour.book');
        Route::post('/review/{tour:slug}', 'BookTourController@review')->name('tour.review');
        Route::post('/payment/{tour:slug}', 'BookTourController@payment')->name('tour.payment');
    });
});

Route::prefix('profile')->middleware(['auth'])->group(function () {
    Route::get('/edit', 'App\Http\Controllers\Auth\ProfileSettingController@edit')->name('profile.setting');
    Route::put('/update', 'App\Http\Controllers\Auth\ProfileSettingController@update')->name('profile.setting.update');
});

Route::namespace('App\Http\Controllers\Admin')->group(function () {
    Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('tour', 'TourController');
        Route::resource('tour-gallery', 'TourGalleryController');
    });
});


Auth::routes();
