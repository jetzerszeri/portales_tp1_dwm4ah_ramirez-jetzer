<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Service;
use App\Models\State;
use App\Http\Requests\CreateRequest;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.requests.index', [
            'requests' => RequestModel::with(['service', 'state'])->get(),
            'h2' => 'Solicitudes',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicesList = Service::all();
        $statesList = State::all();
        return view('admin.requests.create', [
            'requests' => RequestModel::all(),
            'h2' => 'Agregar solicitud',
            'servicesList' => $servicesList,
            'label_nota' => 'Notas',
            'statesList' => $statesList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = request()->all();
        RequestModel::create($data);
        return redirect('/admin/requests');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestModel $solicitud)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestModel $request)
    {
        $servicesList = Service::all();
        $statesList = State::all();
        return view('admin.requests.create', [
            'solicitud' => $request,
            'h2' => 'Editar solicitud',
            'servicesList' => $servicesList,
            'label_nota' => 'Notas',
            'statesList' => $statesList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRequest $request, $id)
    {
        $data = request()->all();

        $solicitud = RequestModel::find($id);
        $solicitud->update($data);

        return redirect('/admin/requests');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestModel $request)
    {
        $request->delete();
        return redirect('/admin/requests');
    }
}
