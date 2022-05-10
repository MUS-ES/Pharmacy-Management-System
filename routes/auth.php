<?php


use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\UsersController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminSessionController;


Route::middleware('guest')->group(function ()
{
    Route::get('signup', [UsersController::class, 'signup'])
        ->name('signup');

    Route::post('signup', [UsersController::class, 'storeRegister']);

    Route::get('signin', [UsersController::class, 'signin'])
        ->name('signin');

    Route::post('signin', [UsersController::class, 'storeLogin']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->group(function ()
{
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::get('signout', [UsersController::class, 'destroy'])
        ->name('signout');
});


/* Admin Routes */
Route::prefix("admin")->name("admin.")->group(function ()
{
    /* Not Authenticated */
    Route::middleware("guest:admin")->group(function ()
    {
        Route::get('login', [AdminSessionController::class, 'create'])->name("login");
        Route::post('login', [AdminSessionController::class, 'store'])->name("login");
        //change
    });
    /* Require Admin Authentication */
    Route::middleware("admin")->group(function ()
    {

        Route::get('/panel', [PanelController::class, "index"])->name('panel');
        Route::get('/panel/activeUser/{id}', [PanelController::class, "activeUser"])->name('panel.activeUser');
        Route::get('/panel/deActiveUser/{id}', [PanelController::class, "deActiveUser"])->name('panel.deActiveUser');
        Route::get('/panel/deleteUser/{id}', [PanelController::class, "deleteUser"])->name('panel.deleteUser');
        Route::get("/logout", [AdminSessionController::class, 'destroy'])->name("logout");
    });
});
Route::post('/checkemail', [UsersController::class, "isEmailExist"]);
