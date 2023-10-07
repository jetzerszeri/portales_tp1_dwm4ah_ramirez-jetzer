<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

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
    return view('services', [
        'services' => Service::all(),
    ]);
});

Route::get('/services/{id}', function ( $id) {
    $service = Service::find($id);

    return view('servicio', [
        'service' => $service,
    ]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/admin/users', function () {
    return view('adminusers', [
        'users' => User::all(),
        'h2' => 'Usuarios',
    ]);
});

Route::get('/admin/users/add', function () {
    return view('adminusersform', [
        'h2' => 'Agregar usuario',
    ]); //como segundo parametro puedo mandar datos a la vista
});

Route::post('/admin/users/add', function ( Request $request ) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
        'lastname' => 'required|min:2|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:100',
    ]);

    if ($validator->fails()) {
        return redirect('/admin/users/add')
            ->withErrors($validator)
            ->withInput();
    }

    User::create([
        'name' => $request->input('name'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'role' => 'editor',
    ]);

    return redirect('/admin/users');

});


Route::get('/admin/users/{id}/edit', function ( $id ) {
    $user = User::find($id); 

    return view('adminusersform', [
        'user' => $user,
        'h2' => 'Editar usuario',
    ]);
});

Route::get('/admin/services', function () {
    // Service::all(); //metdodo para leer todos los servicios de la base de datos

    return view('adminservices', [
        'services' => Service::all(),
        'h2' => 'Servicios',
    ]); //como segundo parametro puedo mandar datos a la vista
});


Route::get('/admin/services/add', function () {
    return view('adminservicesform', [
        'services' => Service::all(),
        'h2' => 'Agregar servicio',
    ]); //como segundo parametro puedo mandar datos a la vista
});

Route::get('/admin/services/{id}/edit', function ( $id ) {
    $service = Service::find($id); 

    // return $service;
    return view('adminservicesform', [
        'service' => $service,
        'h2' => 'Editar servicio',
    ]);
});


Route::post('/admin/services/add', function ( Request $request ) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
        'category' => 'required|in:1,2,3',
        'description' => 'required|min:10|max:1000',
        'img' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/admin/services/add')
            ->withErrors($validator)
            ->withInput();
    }

    // dd($validator->validated());
    // dd($validator->errors());

    $data = request()->all();
    Service::create($data);
    return redirect('/admin/services');
});





Route::patch('/admin/services/{id}/edit', function (Request $request , $id) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
        'category' => 'required|in:1,2,3',
        'description' => 'required|min:10|max:1000',
        'img' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect("/admin/services/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $data = request()->all();

    $service = Service::find($id);
    $service->update($data);

    return redirect('/admin/services');
});