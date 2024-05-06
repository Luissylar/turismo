<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Tour;


class GuestHomeController extends Controller
{
    public function index()
    {

        $tours = Tour::paginate(1);

        return Inertia::render('public/home/home', [
            'tours' => $tours
        ]);
    }


    // public function index()
    // {
    //     return Inertia::render('public/home/home', [
    //         'canLogin' => Route::has('login'),
    //         'canRegister' => Route::has('register'),
    //         'laravelVersion' => Application::VERSION,
    //         'phpVersion' => PHP_VERSION,
    //     ]);
    // }
}
