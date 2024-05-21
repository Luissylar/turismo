<?php

namespace App\Http\Controllers\Admin\Sunat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminSunatController extends Controller
{
    public function index()
    {
        //return "Dashboard de administración";
        return Inertia::render('Admin/Sunat/SunatDashboard');
    }
}
