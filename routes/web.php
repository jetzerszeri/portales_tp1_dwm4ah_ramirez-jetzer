<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

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
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
        'category' => 'required|in:1,2,3',
        'description' => 'required|min:10|max:1000',
        'img' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/admin/services')
            ->withErrors($validator)
            ->withInput();
    }

    // dd($validator->validated());
    // dd($validator->errors());

    $data = request()->all();
    Service::create($data);
    return redirect('/admin/services');
});