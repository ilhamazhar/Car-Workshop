<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();

        return response()->json($service);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|unique:services,service'
        ]);

        $service = Service::create([
            'service' => request('service'),
        ]);

        return response()->json(['message' => 'The service created successfully']);
    }

    public function show(Service $service)
    {
        return $service;
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service' => 'required|unique:services,service,' . $service->id,
        ]);
        
        $service->update([
            'service' => request('service'),
        ]);

        return response()->json(['message' => 'The service updated successfully']);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'The service has been deleted']);
    }
}
