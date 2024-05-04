<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
class AdminDashboardController extends Controller
{
    public function index()
    {
        //return "Dashboard de administración";
        return Inertia::render('Admin/Dashboard');
    }
}
