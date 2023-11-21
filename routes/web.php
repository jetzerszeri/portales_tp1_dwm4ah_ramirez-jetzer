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

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ServicesController as AdminServicesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RequestsController as AdminRequestsController;
use App\Http\Controllers\Admin\StatesController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('index');});

Route::resource('services', ServicesController::class);
Route::resource('requests', RequestsController::class);
Route::resource('login', LoginController::class)->names([ 'index' => 'login']);
Route::resource('contact', ContactController::class);
Route::resource('logout', LogoutController::class); //only has a get method
// Route::resource('admin', AdminController::class); //only has a get method
Route::resource('admin/users', UsersController::class)->middleware('auth');
Route::resource('admin/services', AdminServicesController::class)->middleware('auth');
Route::resource('admin/categories', CategoriesController::class)->middleware('auth');
Route::resource('admin/requests', AdminRequestsController::class)->middleware('auth');
Route::resource('admin/states', StatesController::class)->middleware('auth');



Route::get('/admin', function ( Request $request ) {
    
    if ($request->user()){
        $currentUser = $request->user()->name;
        return view('admin.dashboard', [
            'username' => $currentUser
        ]);
    } else {
        return redirect('/login');
    }
});


