<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ElimiarController extends Controller
{
    public function index()
    {


        return Inertia::render('RegisterDashboard');
    }
}
