<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginUser;
use App\Models\User;




class AuthController extends Controller
{

    public function login(LoginUser $request)
    {
        $user = User::where('email', $request->input('email'))->first();
    
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            return redirect('/admin');
        } else {
            return redirect('/login')->withErrors(['loginError' => 'Credenciales inválidas.']);
        }
    }    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function admin( Request $request )
    {
        $currentUser = $request->user()->name;
        return view('admin.dashboard', [
            'username' => $currentUser
        ]);
    }







}
