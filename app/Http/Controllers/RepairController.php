<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function index()
    {
        $repair = Repair::all();

        return response()->json($repair);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'car_arrive' => 'required|date',
            'proposal' => 'required',
            'status' => 'required',
        ]);

        Repair::create($request->all());

        return response()->json(['message' => 'The repair created successfully']);
    }

    public function show(Repair $repair)
    {
        return $repair;
    }

    public function update(Request $request, Repair $repair)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'car_arrive' => 'required|date',
            'proposal' => 'required',
            'status' => 'required',
        ]);
        
        $repair->update($request->all());

        return response()->json(['message' => 'The repair updated successfully']);
    }

    public function destroy(Repair $repair)
    {
        $repair->delete();

        return response()->json(['message' => 'The repair has been deleted']);
    
    }
}
