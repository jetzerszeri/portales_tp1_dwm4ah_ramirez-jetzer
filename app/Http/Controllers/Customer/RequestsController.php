<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest; // importo el  middleware que acabo de crear
use App\Models\Request as RequestModel;
use App\Models\State;
use App\Models\Service;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicesList = Service::all();
        $statesList = State::all();
        return view('contact', [
            'servicesList' => $servicesList,
            'h2' => '¡Compartenos tu inquietud!',
            'label_nota' => 'Coméntanos, ¿cómo podemos ayudarte?',
            'statesList' => $statesList, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = request()->all();
        RequestModel::create($data);
        return redirect('/requests/success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
