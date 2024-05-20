<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Inertia\Inertia;


use App\Http\Requests\Admin\Destinations\AdminStoreDestinationRequest;

class AdminDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all()->map(function ($destination) {
            return [
                'id' => $destination->id,
                'title' => $destination->title,
                'status' => $destination->status
            ];
        });

        return Inertia::render('Admin/Destinations/Index', [
            'destinations' => $destinations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Destinations/Create');
    }


    public function store(AdminStoreDestinationRequest $request)
    {
        $destination = new Destination($request->validated());

        // Trata la imagen
        if ($request->hasFile('image')) {
            $destination->image = $request->file('image')->store('destinations', 'public');
        }

        try {
            $destination->save();
            return redirect()->route('admin.destinations.create')->with('success', 'Destino creado con éxito.');
        } catch (\Exception $e) {
            return back()->withErrors([
                'message' => 'Error al guardar el destino.',
                'errors' => [
                    'general' => [$e->getMessage()],
                ]
            ])->withInput();
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        // Asumiendo que las imágenes están en public/storage/destinations/
        $destination->image = url('storage/destinations/' . basename($destination->image));

        return Inertia::render('Admin/Destinations/Show', [
            'destination' => $destination->only([
                'id', 'title', 'description', 'content', 'image', 'address',
                'latitude', 'longitude', 'status', 'weather', 'slug', 'accesibility'
            ])
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        return Inertia::render('Admin/Destinations/Edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
