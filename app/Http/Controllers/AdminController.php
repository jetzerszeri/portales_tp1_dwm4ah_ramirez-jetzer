<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        if ($request->user()){
            $currentUser = $request->user()->name;
            return view('admin.dashboard', [
                'username' => $currentUser
            ]);
        } else {
            return redirect('/login');
        }
    }

}
