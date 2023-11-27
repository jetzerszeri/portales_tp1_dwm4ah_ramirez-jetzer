<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\State;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {
        //
        $categoryId = $request->input('cat');

        $services = $categoryId 
                    ? Service::with('category')->where('category_id', $categoryId)->get() 
                    : Service::with('category')->get();
    
        return view('services', [
            'services' => $services,
            'selectedCategory' => $categoryId,
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( Service $service )
    {
        $servicesList = Service::all();
        $statesList = State::all();

        return view('service', [
            'service' => $service,
            'servicesList' => $servicesList,
            'h2' => '¡Obtener estimado gratis!',
            'label_nota' => 'Notas o instrucciones adicionales',
            'statesList' => $statesList,
        ]);

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
