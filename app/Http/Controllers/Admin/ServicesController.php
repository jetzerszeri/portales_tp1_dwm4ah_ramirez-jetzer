<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Http\Requests\CreateService;
use App\Http\Requests\UpdateService;

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

        $filename = '';
        if ($request->hasFile('img')) {
            $filename = 'img/' . time() . '.' . $request->img->extension();
            $request->img->move(public_path('img'), $filename);
        }

        Service::create([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'img' => $filename,
        ]);

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
    public function update(UpdateService $request, Service $service)
    {
        $data = request()->all();
        $service->update([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
        ]);

        if ($request->hasFile('img')) {
            $filename = 'img/' . time() . '.' . $request->img->extension();
            $request->img->move(public_path('img'), $filename);
            $service->update(['img' => $filename]);
        }
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

    public function statistics()
    {
        $weekAgo = now()->subWeek();
        $weekStartDate = $weekAgo->startOfDay();
        $weekEndDate = now()->endOfDay();
        
        $mostRequestedServiceLastWeek = Service::withCount(['requests' => function ($query) use ($weekStartDate, $weekEndDate) {
            $query->whereBetween('created_at', [$weekStartDate, $weekEndDate]);
        }])
        ->orderByDesc('requests_count')
        ->first(['name', 'requests_count']);
        
        $mostRequestedServiceLastWeekInfo = [
            'service' => $mostRequestedServiceLastWeek,
            'date_range' => $weekStartDate->toDateString() . ' - ' . $weekEndDate->toDateString(),
            'requests_count' => $mostRequestedServiceLastWeek ? $mostRequestedServiceLastWeek->requests_count : 0
        ];
        
        
        $monthAgo = now()->subMonth();
        $monthStartDate = $monthAgo->startOfDay();
        $monthEndDate = now()->endOfDay();
        
        $mostRequestedServiceLastMonth = Service::withCount(['requests' => function ($query) use ($monthStartDate, $monthEndDate) {
            $query->whereBetween('created_at', [$monthStartDate, $monthEndDate]);
        }])
        ->orderByDesc('requests_count')
        ->first(['name', 'requests_count']);
        
        $mostRequestedServiceLastMonthInfo = [
            'service' => $mostRequestedServiceLastMonth,
            'date_range' => $monthStartDate->toDateString() . ' - ' . $monthEndDate->toDateString(),
            'requests_count' => $mostRequestedServiceLastMonth ? $mostRequestedServiceLastMonth->requests_count : 0
        ];

        
        
        $mostRequestedServiceAllTime = Service::withCount('requests')
        ->orderByDesc('requests_count')
        ->first(['name', 'requests_count']);
        
        $mostRequestedServiceAllTimeInfo = [
            'service' => $mostRequestedServiceAllTime,
            'date_range' => 'Desde siempre',
            'requests_count' => $mostRequestedServiceAllTime ? $mostRequestedServiceAllTime->requests_count : 0
        ];
        
        

        return view('admin.statistics', [
            'h2' => 'Estadísticas',
            'mostRequestedServiceLastWeek' => $mostRequestedServiceLastWeekInfo,
            'mostRequestedServiceLastMonth' => $mostRequestedServiceLastMonthInfo,
            'mostRequestedServiceAllTime' => $mostRequestedServiceAllTimeInfo,
        ]);
    }
}
