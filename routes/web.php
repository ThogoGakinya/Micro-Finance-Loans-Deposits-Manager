<?php
use App\Http\Controllers\Admin;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
Route::get('/', 'HomeController@index')->name('home');
// Permissions
Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
Route::resource('permissions', 'PermissionsController');

// Roles
Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
Route::resource('roles', 'RolesController');

// Users
Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
Route::resource('users', 'UsersController');

// Accounts
Route::get('myAccount/',  'AccountController@myAccount')->name('accounts.myAccount');
Route::delete('accounts/destroy', 'AccountController@massDestroy')->name('accounts.massDestroy');
Route::resource('accounts', 'AccountController');

// Payments
Route::post('payments/initiate-transaction',  'PaymentController@stkPush')->name('payments.stk-initial');
Route::post('payments/finish',  'PaymentController@finishTransaction')->name('payments.finish');
Route::get('payments/pay',  'PaymentController@getPaymentForm')->name('payments.pay');
Route::get('payments/confirmpayment', 'PaymentController@confirmPayment')->name('payments.confirmpayment');
Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
Route::get('payments/findmonth',  'PaymentController@findMonth')->name('payments.findmonth');
Route::resource('payments', 'PaymentController');

// Minutes
    Route::delete('minutes/destroy', 'MinutesController@massDestroy')->name('minutes.massDestroy');
    Route::post('minutes/media', 'MinutesController@storeMedia')->name('minutes.storeMedia');
    Route::post('minutes/ckmedia', 'MinutesController@storeCKEditorImages')->name('minutes.storeCKEditorImages');
    Route::resource('minutes', 'MinutesController');
});
// Route::post('/initiate-transaction',  'Admin\PaymentController@stkPush')->name('stk-initial');
// Route::get('/pay',  'Admin\PaymentController@getPaymentForm')->name('pay');
// Route::get('/confirmpayment', 'Admin\PaymentController@confirmPayment')->name('confirmpayment');
// Route::get('/findmonth',  'PaymentController@findMonth')->name('payments.findmonth');
