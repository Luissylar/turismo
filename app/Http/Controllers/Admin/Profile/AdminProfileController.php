<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;



class AdminProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Admin/Profile/Show', [
            'user' => $user,
            'confirmsTwoFactorAuthentication' => false, // Ajusta según sea necesario
            'sessions' => [] // Ajusta según sea necesario
        ]);
    }
}
