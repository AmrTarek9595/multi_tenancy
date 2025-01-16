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


// 'web',
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // your actual routes
    });
}
Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
            ])->group(function () {
    // Route::get('/',[App\Http\Controllers\member_client::class, 'redirect_to_home'] );

    Route::get('{any}', function(){return view('welcome');})->where('any','.*');

    // Route::get('/adduser', function () {
    //     return view("auth.register");
    // });
    
    // Route::post('/register',[App\Http\Controllers\member_client::class, 'create_user']);
    
    // Route::get('/login', function () {
    //     return view("auth.login");
    // })->name('login-newview');

    // Route::post('/signin',[App\Http\Controllers\member_client::class, 'signin'])->name('login');
});

