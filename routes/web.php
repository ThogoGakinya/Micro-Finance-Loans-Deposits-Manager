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
Route::resource('users', 'UsersController');

// Accounts
Route::delete('accounts/destroy', 'AccountController@massDestroy')->name('accounts.massDestroy');
Route::resource('accounts', 'AccountController');

// Payments
Route::post('payments/initiate-transaction',  'PaymentController@stkPush')->name('payments.stk-initial');
Route::get('payments/pay',  'PaymentController@getPaymentForm')->name('payments.pay');
Route::get('payments/confirmpayment', 'PaymentController@confirmPayment')->name('payments.confirmpayment');
Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
Route::resource('payments', 'PaymentController');
});
/*Route::post('/initiate-transaction',  'Admin\PaymentController@stkPush')->name('stk-initial');
Route::get('/pay',  'Admin\PaymentController@getPaymentForm')->name('pay');
Route::get('/confirmpayment', 'Admin\PaymentController@confirmPayment')->name('confirmpayment');*/
