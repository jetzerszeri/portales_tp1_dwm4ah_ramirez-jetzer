<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Estimate;
use App\Http\Requests\CreateEstimate;


class EstimatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // return $request;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $current_request = RequestModel::find($request->input('req'));
        // return $current_request;
        return view('admin.estimates.form', [
            'h2' => 'Estimados',
            'request_info' => $current_request,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEstimate $request)
    {
        $estimate = Estimate::create($request->all());

        // Obtener el ID del RequestModel desde los datos del formulario
        $requestId = $request->input('request_id'); // Asegúrate de que 'request_id' es el nombre correcto del campo en tu formulario
    
        // Encuentra el RequestModel y actualízalo con el ID del Estimate
        $requestModel = RequestModel::find($requestId);
        
        if ($requestModel) {
            $requestModel->estimate_id = $estimate->id;
            $requestModel->save();
        }

        return redirect('/admin/requests');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // return $request;
        // return view('admin.estimates.form', [
        //     'h2' => 'Estimados',
        //     'request_info' => $request,
        // ]);
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
