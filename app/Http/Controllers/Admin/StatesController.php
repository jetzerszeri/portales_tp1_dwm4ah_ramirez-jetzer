<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Http\Requests\CreateState;
use App\Http\Requests\UpdateState;


class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.states.index', [
            'states' => State::all(),
            'h2' => 'Estados',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.states.create', [
            'h2' => 'Agregar estado',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateState $request)
    {
        $data = request()->all();
        State::create($data);
        return redirect('/admin/states');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        return view('admin.states.create', [
            'state' => $state,
            'h2' => 'Editar estado',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateState $request, State $state)
    {
        $data = request()->all();
        $state->update($data);
        return redirect('/admin/states');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect('/admin/states');
    }
}
