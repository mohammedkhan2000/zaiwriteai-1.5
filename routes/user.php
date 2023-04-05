<?php

use App\Http\Controllers\User\ContentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth', 'user']], function () {
    Route::get('dashboard/{user?}', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'myProfile'])->name('profile');
    Route::post('profile', [ProfileController::class, 'profileUpdate'])->name('profile.update')->middleware('isDemo');
    Route::get('change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::post('change-password', [ProfileController::class, 'changePasswordUpdate'])->name('change-password.update')->middleware('isDemo');

    Route::get('search/{categoryId?}', [SearchController::class, 'search'])->name('search');
    Route::post('search/store', [SearchController::class, 'searchStore'])->name('search.store');
    Route::get('search-item-update', [SearchController::class, 'searchItemUpdate'])->name('search.item.update');
    Route::get('search-item-favorite', [SearchController::class, 'searchItemFavorite'])->name('search.item.favorite');
    Route::get('search-item-react', [SearchController::class, 'searchItemReact'])->name('search.item.react');
    Route::get('search-item-delete', [SearchController::class, 'searchItemDelete'])->name('search.item.delete');
    Route::get('get-category-content', [SearchController::class, 'getCategoryContent'])->name('category.content');
    Route::get('sub-category-favorite', [ContentController::class, 'subCategoryFavorite'])->name('sub_category.favorite');

    Route::group(['prefix' => 'content', 'as' => 'content.'], function () {
        Route::get('list', [ContentController::class, 'list'])->name('list');
        Route::get('favorite', [ContentController::class, 'favorite'])->name('favorite');
        Route::get('trash', [ContentController::class, 'trash'])->name('trash');
        Route::get('like', [ContentController::class, 'like'])->name('like');
        Route::get('dislike', [ContentController::class, 'dislike'])->name('dislike');
        Route::get('history', [ContentController::class, 'history'])->name('history');
        Route::get('download', [ContentController::class, 'download'])->name('download');
    });

    Route::get('get-plan', [SubscriptionController::class, 'getPlan'])->name('get_plan_modal_data');
    Route::post('subscription/order', [SubscriptionController::class, 'subscriptionOrder'])->name('subscription.order');
    Route::get('subscription/order', [SubscriptionController::class, 'subscriptionOrder'])->name('subscription.order');
    Route::get('get-currency-by-gateway', [SubscriptionController::class, 'getCurrencyByGateway'])->name('get.currency');
    Route::get('subscription/index', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::post('subscription/cancel', [SubscriptionController::class, 'cancelSubscription'])->name('subscription.cancel')->middleware('isDemo');
    Route::get('get-invoice/{id}', [SubscriptionController::class, 'invoicePrint'])->name('subscription.invoice.print');
    Route::post('set-user-package/{id}', [SubscriptionController::class, 'userPackage'])->name('user_packages.update');
});
