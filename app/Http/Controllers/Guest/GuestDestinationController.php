<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

class GuestDestinationController extends Controller
{
    public function index()
    {
        return Inertia::render('public/destinations/Index');
    }

}
