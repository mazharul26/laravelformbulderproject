<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeInfoController;
use App\Http\Controllers\Admin\SmsController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\MailerController;


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


require __DIR__.'/auth.php';
Route::middleware('auth')->group(function ()
{
		Route::resource('dashboard', DashboardController::class);

    Route::name('admin.')->prefix('admin')->group(function () {
			Route::resource('employeeinfo', EmployeeInfoController::class);

	});
});
Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);

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
Route::get("email", [MailerController::class, "email"])->name("email");
Route::get("sms", [SmsController::class, "index"])->name("sms");

Route::post("send-emails", [MailerController::class, "composeEmail"])->name("send-email");
route::view('department','backend.department');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::send('emails/myTestMail', $details, function($message) use ($details) {
        $message->to('admin@admin.com')->subject('User Info');
        $message->from('md.mazharuli30@gmail.com');
    });
    dd("Email is Sent.");
});

