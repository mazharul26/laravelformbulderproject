<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeInfoController;
use App\Http\Controllers\Admin\SmsController;
use App\Http\Controllers\AutoAddressController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Artisan;

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

Route::get('auto-complete-address', [AutoAddressController::class, 'googleAutoAddress']);
route::get('sendmail',function(){
Artisan::call('email:everyminutessendingmail');
return "successfully sending mail";
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function ()
{
		Route::resource('dashboard', DashboardController::class);

    Route::name('admin.')->prefix('admin')->group(function () {
			Route::resource('employeeinfo', EmployeeInfoController::class);

	});
});
Route::get('display-user', [UserController::class, 'index']);
Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
  Route::get('notificationsMarkAsAllRead', [NotificationController::class, "notificationsMarkAsAllRead"])->name("notifications.markAsAllRead");
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
Route::get('importExportView', [MyController::class, 'importExportView']);
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');
//SSLCOMMERZ END

Route::get("sms", [SmsController::class, "index"])->name("sms");

// Route::post("send-emails", [MailerController::class, "composeEmail"])->name("send-email");
route::view('department','backend.department');
route::view('allusers','backend.users');

Route::get("send-mail", [MailerController::class, "sendmail"])->name("email");
// strive gat way

Route::get('/stripe', [StripeController::class, 'stripe']);
Route::post('/stripe-post', [StripeController::class, 'stripePost'])->name('stripe.post');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

