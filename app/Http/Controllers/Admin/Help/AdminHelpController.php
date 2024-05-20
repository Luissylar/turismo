<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminHelpController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Help/Index');
    }
}
