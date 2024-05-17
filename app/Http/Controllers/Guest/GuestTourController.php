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
                'slug' => $tour->slug,
                'idioma' => $tour->idioma,
                'precio' => $tour->precio,
            ];
        });

        // Pasar los datos a la vista
        return Inertia::render('public/tours/index', [
            'tours' => $formattedTours,
        ]);
    }
    //Modificar para pasar solo los datos necesarios, en producción, eliminar este comentario cuando lo hagan

    public function show(Tour $tour)
    {
        //$tou = Tour::with(['itineraries', 'included_services', 'excluded_services','restrictions','faqs'])->findOrFail($id);
        // 'itineraries' => $tour->itineraries,
        // 'includedServices' => $tour->included_services,
        // 'excludedServices' => $tour->excluded_services,
        // 'restrictions' => $tour->restrictions,
        // 'faqs' => $tour->faqs
        // Cargar las relaciones necesarias
        $tour->load(['itineraries', 'included_services', 'excluded_services', 'restrictions', 'faqs']);

        // Retornar los datos a la vista con Inertia
        return inertia('public/tours/show', [
            'tour' => $tour->toArray()
        ]);
    }
}
