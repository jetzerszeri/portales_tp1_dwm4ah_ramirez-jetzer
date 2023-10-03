<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Models\Service;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/servicio', function () {
    return view('servicio');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/admin/users', function () {
    return view('users');
});

Route::post('/admin/users', function ( Request $request ) {
    ddd($request);
});

Route::get('/admin/services', function () {
    return view('adminservices');
});

Route::post('/admin/services', function ( Request $request ) {
    // dd(request()->all());
    // ddd($request);

    // dd(request()->merge([
    //     'ip_address' => request()->ip(),
    // ])->toArray());

    $data = request()->all();
    Service::create($data);
    return redirect('/admin/services');
});