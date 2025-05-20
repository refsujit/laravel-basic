<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get();
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Form validation
        $validData = $request->validate([
            'name' => 'required',
        ]);

        // Method 1 - using new instance
        $model = new Service;
        $model->name = $request->name;
        $model->save();
        return redirect()->back()->withSuccess('Inserted Ok');

        // Method 2 - Mass Inserting
        $insertedModelInstance = Service::create([
            'name' => $request->name,        //  create method i.e. mass assignment, we will need to specify either a fillable or guarded property on our model class.
        ]);

        return redirect()->back()->withSuccess('Inserted Ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // $service = Service::find($id);
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $service->update($validated);
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $result = $service->delete();

        $data = null;
        $statusValue = null;
        
        if ($result) {
            $statusValue = 200;
            $data = [
                'status' => true,
                'message' => 'del ok - '
            ];
        } else {
            $statusValue = 400;
            $data = [
                'status' => false,
                'message' => 'del not'
            ];
        }

        // this approach is followed only for jQuery request case
        // else just delete and return redirect back to other URL
        return response()->json($data, $statusValue); 

    }

    
}
