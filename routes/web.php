<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\Category;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\State;

use App\Http\Requests\LoginUser;

use App\Http\Controllers\Customer\ServicesController;
use App\Http\Controllers\Customer\RequestsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ServicesController as AdminServicesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RequestsController as AdminRequestsController;
use App\Http\Controllers\Admin\StatesController;


Route::get('/', function () { return view('index');});
Route::get('/login', function () { return view('login');})->name('login');


Route::resource('services', ServicesController::class);
Route::resource('requests', RequestsController::class);
Route::resource('contact', ContactController::class);
Route::resource('admin/users', UsersController::class)->middleware('auth');
Route::resource('admin/services', AdminServicesController::class)->middleware('auth');
Route::resource('admin/categories', CategoriesController::class)->middleware('auth');
Route::resource('admin/requests', AdminRequestsController::class)->middleware('auth');
Route::resource('admin/states', StatesController::class)->middleware('auth');


Route::get('/admin', function ( Request $request ) {
        $currentUser = $request->user()->name;
        return view('admin.dashboard', [
            'username' => $currentUser
        ]);
})->middleware('auth');


Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

Route::post('/login', function ( LoginUser $request) {
    $user = User::where('email', $request->input('email'))->first();
    
    if ($user && Hash::check($request->input('password'), $user->password)) {
        Auth::login($user);
        return redirect('/admin');
    } else {
        return redirect('/login')->withErrors(['loginError' => 'Credenciales inválidas.']);
    }
});