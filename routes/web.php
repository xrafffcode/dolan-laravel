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
    Route::get('/transportations/{type}/{transportation:slug}', 'TransportationController@show');


    Route::resource('destinations', 'TourController');
    Route::resource('transportations', 'TransportationController');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/filldata/{tour:slug}', 'BookTourController@store')->name('tour.book');
        Route::post('/review/{tour:slug}', 'BookTourController@review')->name('tour.review');
        Route::post('/payment/{tour:slug}', 'BookTourController@payment')->name('tour.payment');
        Route::post('/payment-process/{tour:slug}', 'BookTourController@payment_proccess')->name('tour.payment_process');
        Route::post('/checkout', 'BookTourController@checkout')->name('tour.checkout-tour');
        Route::get('/checkout/success', function () {
            return view('pages.user.progress');
        })->name('checkout-progress');

        Route::get('/myorder', 'MyOrderController@index')->name('myorder');
        Route::get('/myorder/payment-tour', 'MyOrderController@paymentTour')->name('myorder.tour.payment');
        Route::get('/myorder/cancel-tour/{id}', 'MyOrderController@cancelTour')->name('myorder.tour.cancel');
        Route::post('/myorder/process-payment-tour', 'MyOrderController@processPaymentTour')->name('myorder.tour.process_payment');

        Route::post('/myorder/voucher/tour', 'MyOrderController@voucherTour')->name('myorder.voucher.tour');
    });
});

Route::prefix('profile')->middleware(['auth'])->group(function () {
    Route::get('/edit', 'App\Http\Controllers\Auth\ProfileSettingController@edit')->name('profile.setting');
    Route::put('/update', 'App\Http\Controllers\Auth\ProfileSettingController@update')->name('profile.setting.update');
});

Route::namespace('App\Http\Controllers\Admin')->group(function () {
    Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::post('transaction-destinations/{transaction}', 'TransactionController@cancel')->name('transaction-destinations.cancel');
        Route::resource('tour', 'TourController');
        Route::resource('tour-gallery', 'TourGalleryController');
        Route::resource('transportation', 'TransportationsController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('hotel', 'HotelController');
        Route::resource('hotel-gallery', 'HotelGalleryController');
    });
});


Auth::routes();
