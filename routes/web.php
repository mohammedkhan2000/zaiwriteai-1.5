<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VersionUpdateController;
use App\Models\Language;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

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


Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('contact.us');
Route::post('contact-us-store', [FrontendController::class, 'contactUsStore'])->name('contact.us.store');
Route::get('pages/{slug}', [FrontendController::class, 'pages'])->name('pages');

Auth::routes(['verify' => false]);

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('email/verified/{token}', [RegistrationController::class, 'emailVerified'])->name('email.verified');
    Route::get('email/verify/{token}', [RegistrationController::class, 'emailVerify'])->name('email.verify');
    Route::post('email/verify/resend/{token}', [RegistrationController::class, 'emailVerifyResend'])->name('email.verify.resend');
});

Route::get('/local/{ln}', function ($ln) {
    $language = Language::where('code', $ln)->first();
    if (!$language) {
        $language = Language::where('default', 1)->first();
        if ($language) {
            $ln = $language->code;
        }
    }

    session(['local' => $ln]);
    Carbon::setLocale($ln);
    App::setLocale(session()->get('local'));
    return redirect()->back();
})->name('local');

Route::group(['middleware' => ['auth', 'version.update']], function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('notification-status/{id}', [NotificationController::class, 'status'])->name('notification.status');
});

Route::group(['prefix' => 'payment'], function () {
    Route::post('/', [PaymentController::class, 'checkout'])->name('payment.checkout')->middleware('isDemo')->withoutMiddleware('version.update');
    Route::match(array('GET', 'POST'), 'verify', [PaymentController::class, 'verify'])->name('payment.verify')->middleware('isDemo')->withoutMiddleware('version.update');
});

Route::get('version-update', [VersionUpdateController::class, 'versionUpdate'])->name('version-update')->withoutMiddleware('version.update');
Route::post('process-update', [VersionUpdateController::class, 'processUpdate'])->name('process-update')->withoutMiddleware('version.update');
