<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GatewayController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\HowItWorkController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TicketTopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\VersionUpdateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'myProfile'])->name('profile');
    Route::post('profile', [ProfileController::class, 'profileUpdate'])->name('profile.update')->middleware('isDemo');
    Route::get('change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::post('change-password', [ProfileController::class, 'changePasswordUpdate'])->name('change-password.update')->middleware('isDemo');;

    Route::group(['prefix' => 'subscriptions', 'as' => 'subscriptions.'], function () {
        Route::get('orders', [SubscriptionController::class, 'orders'])->name('orders');
        Route::get('orders/get-info', [SubscriptionController::class, 'orderGetInfo'])->name('orders.get.info'); // ajax
        Route::post('orders/payment-status-change', [SubscriptionController::class, 'orderPaymentStatusChange'])->name('order.payment.status.change')->middleware('isDemo');
        Route::get('orders-payment-status', [SubscriptionController::class, 'ordersStatus'])->name('orders.payment.status'); // ajax
    });

    Route::group(['prefix' => 'packages', 'as' => 'packages.'], function () {
        Route::get('/', [PackageController::class, 'index'])->name('index');
        Route::get('get-info', [PackageController::class, 'getInfo'])->name('get.info'); // ajax
        Route::post('store', [PackageController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [PackageController::class, 'destroy'])->name('destroy');
        Route::get('pay/{id}', [PackageController::class, 'pay'])->name('pay');
        Route::get('user', [PackageController::class, 'userPackage'])->name('user');
        Route::post('assign', [PackageController::class, 'assignPackage'])->name('assign');
    });

    Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
        Route::get('country-list', [LocationController::class, 'countryList'])->name('country.list');
        Route::get('state-list', [LocationController::class, 'stateList'])->name('state.list');
        Route::get('city-list', [LocationController::class, 'cityList'])->name('city.list');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('store', [CategoryController::class, 'store'])->name('store')->middleware('isDemo');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'sub-category', 'as' => 'sub-category.'], function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::get('get-info', [SubCategoryController::class, 'getInfo'])->name('get.info');
        Route::post('store', [SubCategoryController::class, 'store'])->name('store')->middleware('isDemo');
        Route::delete('destroy/{id}', [SubCategoryController::class, 'destroy'])->name('destroy');
    });

    Route::get('cache-clear', [SettingController::class, 'cache_clear'])->name('cache.clear');

    Route::group(['prefix' => 'language', 'as' => 'language.'], function () {
        Route::get('/', [LanguageController::class, 'index'])->name('index');
        Route::post('store', [LanguageController::class, 'store'])->name('store')->middleware('isDemo');
        Route::post('update/{id}', [LanguageController::class, 'update'])->name('update')->middleware('isDemo');
        Route::delete('delete/{id}', [LanguageController::class, 'delete'])->name('delete');

        Route::get('translate/{id}/{iso_code?}', [LanguageController::class, 'translateLanguage'])->name('translate');
        Route::get('update-translate/{id}', [LanguageController::class, 'updateTranslate'])->name('update.translate');
        Route::post('import', [LanguageController::class, 'import'])->name('import')->middleware('isDemo');
    });

    Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::get('details/{id}', [TicketController::class, 'details'])->name('details');
        Route::post('reply', [TicketController::class, 'reply'])->name('reply')->middleware('isDemo');
        Route::get('status-change', [TicketController::class, 'statusChange'])->name('status.change');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'list'])->name('list');
        Route::post('store', [UserController::class, 'store'])->name('store')->middleware('isDemo');
        Route::get('get-info', [UserController::class, 'getInfo'])->name('get.info'); // ajax
        Route::get('details/{id}', [UserController::class, 'details'])->name('details');
        Route::post('status', [UserController::class, 'status'])->name('status');
    });

    Route::group(['prefix' => 'home-setting', 'as' => 'home-setting.'], function () {
        Route::get('section', [HomeSettingController::class, 'section'])->name('section');
    });

    // Start:: Setting
    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('general-setting', [SettingController::class, 'generalSetting'])->name('general-setting');
        Route::post('general-settings-update', [SettingController::class, 'generalSettingUpdate'])->name('general-setting.update')->middleware('isDemo');
        Route::get('color-setting', [SettingController::class, 'colorSetting'])->name('color-setting');
        Route::get('color-setting', [SettingController::class, 'colorSetting'])->name('color-setting');
        Route::get('smtp-setting', [SettingController::class, 'smtpSetting'])->name('smtp.setting');
        Route::post('send-test-mail', [SettingController::class, 'sendTestMail'])->name('send.test.mail')->middleware('isDemo');
        Route::get('chat-gpt-api', [SettingController::class, 'chatGptApiSetting'])->name('chat-gpt-api')->middleware('isDemo');
        Route::get('google-analytics', [SettingController::class, 'googleAnalytics'])->name('google-analytics')->middleware('isDemo');
        Route::post('general-settings-env-update', [SettingController::class, 'generalSettingEnvUpdate'])->name('general-setting-env.update')->middleware('isDemo');

        //Start:: Currency Settings
        Route::group(['prefix' => 'currency', 'as' => 'currency.'], function () {
            Route::get('', [CurrencyController::class, 'index'])->name('index');
            Route::post('store', [CurrencyController::class, 'store'])->name('store');
            Route::put('update/{id}', [CurrencyController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [CurrencyController::class, 'delete'])->name('destroy');
        });
        //End:: Currency Settings

        Route::group(['prefix' => 'gateway', 'as' => 'gateway.'], function () {
            Route::get('/', [GatewayController::class, 'index'])->name('index');
            Route::post('store', [GatewayController::class, 'store'])->name('store')->middleware('isDemo');
            Route::get('get-info', [GatewayController::class, 'getInfo'])->name('get.info');
            Route::get('get-currency-by-gateway', [GatewayController::class, 'getCurrencyByGateway'])->name('get.currency');
        });

        Route::group(['prefix' => 'ticket-topic', 'as' => 'ticket-topic.'], function () {
            Route::get('/', [TicketTopicController::class, 'index'])->name('index');
            Route::post('store', [TicketTopicController::class, 'store'])->name('store')->middleware('isDemo');
            Route::delete('destroy/{id}', [TicketTopicController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
            Route::get('/', [BrandController::class, 'index'])->name('index');
            Route::post('store', [BrandController::class, 'store'])->name('store')->middleware('isDemo');
            Route::delete('destroy/{id}', [BrandController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'how-it-work', 'as' => 'how-it-work.'], function () {
            Route::get('/', [HowItWorkController::class, 'index'])->name('index');
            Route::post('store', [HowItWorkController::class, 'store'])->name('store')->middleware('isDemo');
            Route::delete('destroy/{id}', [HowItWorkController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'testimonials', 'as' => 'testimonials.'], function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('index');
            Route::post('store', [TestimonialController::class, 'store'])->name('store')->middleware('isDemo');
            Route::delete('destroy/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
            Route::get('/', [FaqController::class, 'index'])->name('index');
            Route::post('store', [FaqController::class, 'store'])->name('store')->middleware('isDemo');
            Route::delete('destroy/{id}', [FaqController::class, 'destroy'])->name('destroy');
        });

        Route::get('version-update', [VersionUpdateController::class, 'versionFileUpdate'])->name('file-version-update')->middleware('isDemo');
        Route::post('version-update', [VersionUpdateController::class, 'versionFileUpdateStore'])->name('file-version-update-store')->middleware('isDemo');
        Route::get('version-update-execute', [VersionUpdateController::class, 'versionUpdateExecute'])->name('file-version-update-execute')->middleware('isDemo');
        Route::get('version-delete', [VersionUpdateController::class, 'versionFileUpdateDelete'])->name('file-version-delete')->middleware('isDemo');


        Route::get('storage-link', [SettingController::class, 'storageLink'])->name('storage.link');
        Route::get('migrate-seed', [SettingController::class, 'migrateSeed']);
    });
    // setting end
});
