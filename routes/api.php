<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;


/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
// Route::get('/', function () {
//     return "sssss";
// });
// Route::middleware([
//     'web',
//     InitializeTenancyByDomain::class,
//     PreventAccessFromCentralDomains::class,
// ])->group(function () {
//     Route::get('/', function () {
//         // dd(\App\Models\User::all());
//         return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
//     }); 
    
//     Route::get('/adduser', function () {
//         return view("auth.register");
//     });
//      Route::post('/register',[App\Http\Controllers\member_client::class, 'create_user']);

//      Route::get('/login', function () {
//         return view("auth.login");
//     }); 


//     Route::post('/signin',[App\Http\Controllers\member_client::class, 'signin'])->name('signin');


    
// });

// 'web',


Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
            ])->group(function () {
    Route::post('/login',[App\Http\Controllers\member_client::class, 'signin']); //لTrue Tested on postman
    Route::post('/logout',[App\Http\Controllers\member_client::class, 'logout']); //لTrue Tested on postman
    Route::post('/create_user',[App\Http\Controllers\member_client::class, 'create_user']);//True Tested on postman
    Route::post('/return_current_user_data',[App\Http\Controllers\member_client::class, 'return_current_user_data']); //لTrue Tested on postman
    Route::post('/AddQuiz',[App\Http\Controllers\member_client::class, 'AddQuiz']); //لTrue Tested on postman
    Route::post('/ReturnAllQuizes',[App\Http\Controllers\member_client::class, 'ReturnAllQuizes']); //لTrue Tested on postman
    Route::post('/ReturnCustomQuizes/{id}',[App\Http\Controllers\member_client::class, 'ReturnCustomQuizes']); //لTrue Tested on postman
    Route::post('/UpdateQuiz/{id}',[App\Http\Controllers\member_client::class, 'UpdateQuiz']); //لTrue Tested on postman
    Route::post('/DisplayAllUsers',[App\Http\Controllers\member_client::class, 'DisplayAllUsers']); //لTrue Tested on postman
    Route::post('/DisplayCutomUsers/{id}',[App\Http\Controllers\member_client::class, 'DisplayCutomUsers']); //لTrue Tested on postman
    Route::post('/UpdateUserData',[App\Http\Controllers\member_client::class, 'UpdateUserData']); //لTrue Tested on postman
    Route::post('/DeleteStudent/{id}',[App\Http\Controllers\member_client::class, 'DeleteStudent']); //لTrue Tested on postman
/**
 * **************************
 * ******Student Area********
 * **************************
 *  */

 Route::post('/RetriveQuizz',[App\Http\Controllers\member_client::class, 'RetriveQuizz']); //لTrue Tested on postman
 Route::post('/GetQuiz/{id}',[App\Http\Controllers\member_client::class, 'GetQuiz']); //لTrue Tested on postman
 Route::post('/PostQuizResutl/{id}',[App\Http\Controllers\member_client::class, 'PostQuizResutl']); //لTrue Tested on postman

});

// Route::post('/admin/login',[App\Http\Controllers\member_client::class, 'signin']);



