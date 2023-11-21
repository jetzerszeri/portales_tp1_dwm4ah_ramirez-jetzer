<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Http\Requests\CreateService;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            return view('admin.services.index', [
                'services' => Service::with('category')->get(),
                'h2' => 'Servicios',
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoriesList = Category::all();
        return view('admin.services.create', [
            'services' => Service::all(),
            'h2' => 'Agregar servicio',
            'categoriesList' => $categoriesList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateService $request)
    {
        $data = request()->all();
        Service::create($data);
        return redirect('/admin/services');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categoriesList = Category::all();
        return view('admin.services.create', [
            'service' => $service,
            'h2' => 'Editar servicio',
            'categoriesList' => $categoriesList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateService $request, Service $service)
    {
        $data = request()->all();
        $service->update($data);
        return redirect('/admin/services');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect('/admin/services');
    }
}
