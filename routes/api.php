<?php
/**************************Auth************************************* */
use App\Http\Controllers\API\Auth\RecoveryPasswordController;
use App\Http\Controllers\API\Auth\User\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\FileController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeController;
use App\Mail\General;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BoardController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\ChatController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\Geocode\CountryController;

//login
Route::post('/login', [LoginController::class, 'login'])->name('login');

//register
Route::prefix('register')->group(function(){
    Route::post('/', [RegisterController::class, 'register'])->name('register');
    //opertaions reg, login
    Route::post('/check-code', [RegisterController::class, 'checkCodeRegister'])->name('check-code-register');
    Route::get('/resend-code', [RegisterController::class, 'resendCodeRegister'])->name('resend-code-register');
});

//recovery-by-password
Route::prefix('recovery-by-password')->group(function(){
    Route::post('forgot-password',  [RecoveryPasswordController::class,'forgotPassword'])->name('forgot-password');
    //opertaions recovery-by-password
    Route::post('check-code', [RecoveryPasswordController::class,'checkCode'])->name('check-code-pass');
    Route::get('resend-code', [RecoveryPasswordController::class,'resendCode'])->name('resend-code-pass');
    Route::post('reset-password', [RecoveryPasswordController::class,'resetPassword'])->name('reset-password');
});

//file
Route::post('/upload-files/{modelName}/{id}',[FileController::class,'storeFiles'])->name('file.store-files');

//home
Route::get('/home',[HomeController::class,'index'])->name('home.all');

//Lang
Route::get('lang/{lang}', ['as' => 'lang.switch.api', 'uses' => 'App\Http\Controllers\API\LanguageController@switchLang']);
Route::get('get-all-langs', ['as' => 'lang.langs.api', 'uses' => 'App\Http\Controllers\API\LanguageController@getAllLangs']);
Route::get('default-lang', ['as' => 'lang.default-lang.api', 'uses' => 'App\Http\Controllers\API\LanguageController@defaultLang']);

//fcm_token
Route::post('/update-fcm',[NotificationController::class,'updateFcm'])->name('update-fcm');
// ******* modules ******** //
//banners
Route::resource('banners', BannerController::class)->only(['index']);
//boards
Route::resource('boards', BoardController::class)->only(['index']);

Route::middleware(['auth:api','role:user'])->group(function(){
    Route::prefix('profile')->as('profile.')->group(function(){
        Route::get('/', [ProfileController::class,'show'])->name('show');
        Route::put('/', [ProfileController::class,'update'])->name('update');
        Route::put('update-password', [ProfileController::class,'updatePassword'])->name('update-password');
    });

    // ******* modules ******** //
    //chats
    Route::resource('chats', ChatController::class)->only(['index','store','update','destroy']);

    Route::delete('chats', [ChatController::class,'deleteAll']);

    //favorites
    Route::resource('favorites', FavoriteController::class)->only(['index','store','destroy']);

    //gecodes
    Route::resource('countries', CountryController::class)->only(['index']);

    //notifications
    Route::get('/',[NotificationController::class,'index']);
    Route::post('/send-notification/user/{userId}',[NotificationController::class,'sendNotificationMethod']);

    //orders
    Route::resource('orders', OrderController::class);

    //reviews
    Route::resource('reviews', ReviewController::class);


    //logout
    Route::delete('/logout', [LoginController::class, 'destroy']);
});

