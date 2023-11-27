<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\Category;
use App\Models\Request as RequestModel;
use App\Models\State;
use App\Http\Requests\LoginUser;
use App\Http\Requests\CreateRequest;
use App\Http\Controllers\Customer\ServicesController;
use App\Http\Controllers\Customer\RequestsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ServicesController as AdminServicesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RequestsController as AdminRequestsController;
use App\Http\Controllers\Admin\StatesController;
use App\Http\Controllers\Admin\AuthController;



Route::view('/', 'index');
Route::view('/login', 'login')->name('login');
Route::resource('services', ServicesController::class);
Route::resource('requests', RequestsController::class);
Route::resource('admin/users', UsersController::class)->middleware('auth');
Route::resource('admin/services', AdminServicesController::class)->middleware('auth');
Route::resource('admin/categories', CategoriesController::class)->middleware('auth');
Route::resource('admin/requests', AdminRequestsController::class)->middleware('auth');
Route::resource('admin/states', StatesController::class)->middleware('auth');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/admin', [AuthController::class, 'admin'])->middleware('auth');



// Route::get('/admin', function ( Request $request ) {
//         $currentUser = $request->user()->name;
//         return view('admin.dashboard', [
//             'username' => $currentUser
//         ]);
// })->middleware('auth');



// Route::get('/logout', function(){
//     Auth::logout();
//     return redirect('/login');
// });


// Route::post('/login', function ( LoginUser $request) {
//     $user = User::where('email', $request->input('email'))->first();
    
//     if ($user && Hash::check($request->input('password'), $user->password)) {
//         Auth::login($user);
//         return redirect('/admin');
//     } else {
//         return redirect('/login')->withErrors(['loginError' => 'Credenciales inválidas.']);
//     }
// });


Route::get('/contact', function () {
    $servicesList = Service::all();
    $statesList = State::all();
    return view('contact', [
        'servicesList' => $servicesList,
        'h2' => '¡Compartenos tu inquietud!',
        'label_nota' => 'Coméntanos, ¿cómo podemos ayudarte?',
        'statesList' => $statesList, 
    ]);
});



Route::post('/contact', function (CreateRequest $request) {
    $data = request()->all();
    RequestModel::create($data);
    return redirect('/success');
});