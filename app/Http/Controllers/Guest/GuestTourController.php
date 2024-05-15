<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Tour;

class GuestTourController extends Controller
{
    public function index()
    {
        // Obtener los tours sin orden específico
        $tours = Tour::get();
    
        // Mapear los tours en el formato deseado
        $formattedTours = $tours->map(function ($tour) {
            return [
                'id' => $tour->id,
                'title' => $tour->title,
                'description_corta' => $tour->description_corta,
                'duracion_horas' => $tour->duracion_horas,
                'hora_inicio' => $tour->hora_inicio,
                'hora_fin' => $tour->hora_fin,
                'max_personas' => $tour->max_personas,
                'min_personas' => $tour->min_personas,
                'idioma' => $tour->idioma,
                'precio' => $tour->precio,
            ];
        });
    
        // Pasar los datos a la vista
        return Inertia::render('public/tours/index', [
            'tours' => $formattedTours,
        ]);
    }

    public function show(Tour $tour)
    {
        return inertia('public/tours/show', ['tour' => $tour->only('id', 'title', 'description_corta', 'hora_inicio', 'hora_fin', 'min_personas', 'max_personas', 'idioma', 'precio')]);    
    }
    
    
}
