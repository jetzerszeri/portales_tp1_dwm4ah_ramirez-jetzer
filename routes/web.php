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
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ServicesController as AdminServicesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RequestsController as AdminRequestsController;




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
Route::resource('success', SuccessController::class); //only has a get method
Route::resource('logout', LogoutController::class); //only has a get method
// Route::resource('admin', AdminController::class); //only has a get method
Route::resource('admin/users', UsersController::class)->middleware('auth');
Route::resource('admin/services', AdminServicesController::class)->middleware('auth');
Route::resource('admin/categories', CategoriesController::class)->middleware('auth');
Route::resource('admin/requests', AdminRequestsController::class)->middleware('auth');



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