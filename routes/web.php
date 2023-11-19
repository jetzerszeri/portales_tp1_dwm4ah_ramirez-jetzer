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
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;



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
Route::resource('login', LoginController::class);
Route::resource('contact', ContactController::class);
Route::resource('success', SuccessController::class); //only has a get method
Route::resource('logout', LogoutController::class); //only has a get method
Route::resource('admin', AdminController::class); //only has a get method






Route::get('/admin/users', function (Request $request) {
    $user = $request->user();
    if($user && $user->role == 'admin'){
        return view('adminusers', [
            'users' => User::all(),
            'h2' => 'Usuarios',
        ]);
    } else {
        return redirect('/admin');
    }
});

Route::get('/admin/users/add', function ( Request $request ) {
    $user = $request->user();
    if($user && $user->role == 'admin'){
        return view('adminusersform', [
            'h2' => 'Agregar usuario',
        ]);
    } else {
        return redirect('/admin');
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
    $currentUser = $request->user();
    if($currentUser && $currentUser->role == 'admin'){
        return view('adminusersform', [
            'user' => $user,
            'h2' => 'Editar usuario',
        ]);
    } else {
        return redirect('/admin');
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

Route::delete('/admin/users/{id}', function ($id) {
    $userToDelete = User::findOrFail($id);
    $userToDelete->delete();
    return redirect('/admin/users');
});



Route::get('/admin/services', function (Request $request) {
    if($request->user()){
        return view('adminservices', [
            'services' => Service::with('categoryRelation')->get(),
            'h2' => 'Servicios',
        ]);
    } else {
        return redirect('/login');
    }
});


Route::get('/admin/services/add', function (Request $request) {
    if($request->user()){
        $categoriesList = Category::all();
        return view('adminservicesform', [
            'services' => Service::all(),
            'h2' => 'Agregar servicio',
            'categoriesList' => $categoriesList,
        ]);
    } else {
        return redirect('/login');
    }
});

Route::get('/admin/services/{id}/edit', function (Request $request, $id ) {
    if($request->user()){
        $service = Service::find($id); 
        $categoriesList = Category::all();
        // return $service;
        return view('adminservicesform', [
            'service' => $service,
            'h2' => 'Editar servicio',
            'categoriesList' => $categoriesList,
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

Route::delete('/admin/services/{id}', function ($id) {
    $serviceToDelete = Service::findOrFail($id);
    $serviceToDelete->delete();
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

Route::delete('/admin/categories/{id}', function ($id) {
    $categoryToDelete = Category::findOrFail($id);
    $categoryToDelete->delete();
    return redirect('/admin/categories');
});


Route::get('/admin/requests', function (Request $request) {

    if($request->user() ){
        return view('adminrequests', [
            'requests' => RequestModel::with(['service', 'state'])->get(),
            'h2' => 'Solicitudes',
        ]);
    } else {
        return redirect('/login');
    }
});


Route::get('/admin/requests/add', function (Request $request) {
    if($request->user()){
        $servicesList = Service::all();
        $statesList = State::all();
        return view('adminrequestsform', [
            'requests' => RequestModel::all(),
            'h2' => 'Agregar solicitud',
            'servicesList' => $servicesList,
            'label_nota' => 'Notas',
            'statesList' => $statesList,
        ]);
    } else {
        return redirect('/login');
    }
});

Route::post('admin/requests/add', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:20',
        'lastname' => 'required|min:2|max:20',
        'email' => 'required|email',
        'address' => 'required|min:2|max:100',
        'city' => 'required|min:3|max:30',
        'state_id' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
        'zip_code' => 'required|digits:5',
        'service_id' => 'required|exists:services,id',
        'service_date' => 'date|after_or_equal:today',
        'notes' => 'required|max:1000',
    ]);

    if($validator->fails()){
        return redirect("/admin/requests/add")
            ->withErrors($validator)
            ->withInput();
    };

    $data = request()->all();
    RequestModel::create($data);
    return redirect('/admin/requests');
});



Route::get('/admin/requests/{id}/edit', function (Request $request, $id ) {
    if($request->user()){
        $servicesList = Service::all();
        $solicitud = RequestModel::find($id); 
        $statesList = State::all();
        return view('adminrequestsform', [
            'solicitud' => $solicitud,
            'h2' => 'Editar solicitud',
            'servicesList' => $servicesList,
            'label_nota' => 'Notas',
            'statesList' => $statesList,
        ]);
    } else {
        return redirect('/login');
    }
});


Route::patch('/admin/requests/{id}/edit', function (Request $request, $id){
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:20',
        'lastname' => 'required|min:2|max:20',
        'email' => 'required|email',
        'address' => 'required|min:2|max:100',
        'city' => 'required|min:3|max:30',
        'state_id' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
        'zip_code' => 'required|digits:5',
        'service_id' => 'required|exists:services,id',
        'service_date' => 'date|after_or_equal:today',
        'notes' => 'required|max:1000',
    ]);

    if($validator->fails()){
        return redirect("/admin/requests/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    };

    $data = request()->all();

    $solicitud = RequestModel::find($id);
    $solicitud->update($data);

    return redirect('/admin/requests');
});

Route::delete('/admin/requests/{id}', function ($id) {
    $requestToDelete = RequestModel::findOrFail($id);
    $requestToDelete->delete();
    return redirect('/admin/requests');
});


Route::get('/admin/states', function (Request $request) {

    if($request->user() ){
        return view('adminstates', [
            'states' => State::all(),
            'h2' => 'Estados',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::get('/admin/states/add', function (Request $request) {
    if($request->user()){
        return view('adminstatesform', [
            // 'states' => State::all(),
            'h2' => 'Agregar estado',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::post('/admin/states/add', function ( Request $request ) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
        'abbreviation' => 'required|min:2|max:2',
    ]);

    if ($validator->fails()) {
        return redirect('/admin/states/add')
            ->withErrors($validator)
            ->withInput();
    }

    $data = request()->all();
    State::create($data);
    return redirect('/admin/states');
});

Route::get('/admin/states/{id}/edit', function (Request $request, $id ) {
    if($request->user()){
        $state = State::find($id); 

        return view('adminstatesform', [
            'state' => $state,
            'h2' => 'Editar estado',
        ]);
    } else {
        return redirect('/login');
    }
});

Route::patch('/admin/states/{id}/edit', function (Request $request , $id) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3|max:100',
        'abbreviation' => 'required|min:2|max:2|unique:states,abbreviation,' . $id,
    ]);

    if ($validator->fails()) {
        return redirect("/admin/states/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $data = request()->all();

    $state = State::find($id);
    $state->update($data);

    return redirect('/admin/states');
});

Route::delete('/admin/states/{id}', function ($id) {
    $stateToDelete = State::findOrFail($id);
    $stateToDelete->delete();
    return redirect('/admin/states');
});