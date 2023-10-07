<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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

Route::post('/login', function ( Request $request ) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if ($validator->fails()) {
        return redirect('/login')
            ->withErrors($validator)
            ->withInput($request->except('password'));  // No devolvemos la contraseña por razones de seguridad
    }

    $user = User::where('email', $request->input('email'))->first();
    
    if ($user && Hash::check($request->input('password'), $user->password)) {
        Auth::login($user);
        return redirect('/admin');
    } else {
        return redirect('/login')->withErrors(['loginError' => 'Credenciales inválidas.']);
    }

});

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});


Route::get('/admin', function ( Request $request ) {
    
    if ($request->user()){
        $currentUser = $request->user()->name;
        return view('dashboard', [
            'username' => $currentUser
        ]);
    } else {
        return redirect('/login');
    }

});

Route::get('/admin/users', function (Request $request) {

    if($request->user()){
        return view('adminusers', [
            'users' => User::all(),
            'h2' => 'Usuarios',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::get('/admin/users/add', function ( Request $request ) {
    if($request->user()){
        return view('adminusersform', [
            'h2' => 'Agregar usuario',
        ]);
    } else {
        return redirect('/login');
    }
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


Route::get('/admin/users/{id}/edit', function (Request $request , $id ) {
    $user = User::find($id); 

    if($request->user()){
        return view('adminusersform', [
            'user' => $user,
            'h2' => 'Editar usuario',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::patch('/admin/users/{id}/edit', function ( Request $request , $id ) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
        'lastname' => 'required|min:2|max:100',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'required|min:6|max:100',
    ]);

    if ($validator->fails()) {
        return redirect("/admin/users/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    };

    $data = [
        'name' => $request->input('name'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ];

    $user = User::find($id); 
    $user->update($data);

    return redirect('/admin/users');

});



Route::get('/admin/services', function (Request $request) {
    if($request->user()){
        return view('adminservices', [
            'services' => Service::all(),
            'h2' => 'Servicios',
        ]);
    } else {
        return redirect('/login');
    }
});


Route::get('/admin/services/add', function (Request $request) {
    if($request->user()){
        return view('adminservicesform', [
            'services' => Service::all(),
            'h2' => 'Agregar servicio',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::get('/admin/services/{id}/edit', function (Request $request, $id ) {
    if($request->user()){
        $service = Service::find($id); 

        // return $service;
        return view('adminservicesform', [
            'service' => $service,
            'h2' => 'Editar servicio',
        ]);
    } else {
        return redirect('/login');
    }
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

Route::get('/admin/categories', function (Request $request) {

    if($request->user() ){
        return view('admincategories', [
            'categories' => Category::all(),
            'h2' => 'Categorías',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::get('/admin/categories/add', function (Request $request) {
    if($request->user()){
        return view('admincategoriesform', [
            'categories' => Category::all(),
            'h2' => 'Agregar categoría',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::post('/admin/categories/add', function ( Request $request ) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
    ]);

    if ($validator->fails()) {
        return redirect('/admin/categories/add')
            ->withErrors($validator)
            ->withInput();
    }

    $data = request()->all();
    Category::create($data);
    return redirect('/admin/categories');
});

Route::get('/admin/categories/{id}/edit', function (Request $request, $id ) {
    if($request->user()){
        $category = Category::find($id); 

        return view('admincategoriesform', [
            'category' => $category,
            'h2' => 'Editar categoría',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::patch('/admin/categories/{id}/edit', function (Request $request , $id) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100|unique:categories,name,' . $id,
    ]);

    if ($validator->fails()) {
        return redirect("/admin/categories/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $data = request()->all();

    $category = Category::find($id);
    $category->update($data);

    return redirect('/admin/categories');
});