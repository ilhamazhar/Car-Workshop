<?php

namespace App\Http\Controllers;

use App\Models\JobList;
use Illuminate\Http\Request;

class JobListController extends Controller
{
    public function index()
    {
        $jobList = JobList::all();

        return response()->json($jobList);
    }

    public function store(Request $request)
    {
        $request->validate([
            'detail' => 'required',
        ]);

        JobList::create($request->all());

        return response()->json(['message' => 'The jobList created successfully']);
    }

    public function show(JobList $jobList)
    {
        return $jobList;
    }

    public function update(Request $request, JobList $jobList)
    {
        $request->validate([
            'detail' => 'required',
        ]);
        
        $jobList->update($request->all());

        return response()->json(['message' => 'The jobList updated successfully']);
    }

    public function destroy(JobList $jobList)
    {
        $jobList->delete();

        return response()->json(['message' => 'The jobList has been deleted']);
    
    }
}
