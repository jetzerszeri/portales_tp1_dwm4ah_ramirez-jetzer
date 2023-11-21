<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;
use App\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if($user->role->name == 'admin'){
            return view('admin.users.index', [
                'users' => User::all(),
                'h2' => 'Usuarios',
            ]);
        } else {
            return redirect('/admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request )
    {
        $user = $request->user();
        $roleList = Role::all();
        if($user->role->name == 'admin'){
            return view('admin.users.create', [
                'h2' => 'Agregar usuario',
                'roleList' => $roleList,
            ]);
        } else {
            return redirect('/admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUser $request)
    {
        User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
        ]);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Request $request)
    {
        $currentUser = $request->user();
        $roleList = Role::all();
        if($currentUser && $currentUser->role->name == 'admin'){
            return view('admin.users.create', [
                'user' => $user,
                'h2' => 'Editar usuario',
                'roleList' => $roleList,
            ]);
        } else {
            return redirect('/admin');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, User $user)
    {
        $data = [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
        ];

        $user->update($data);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users');
    }
}
