<?php

namespace App\Http\Controllers\Admin\Facturacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminFacturacionController extends Controller
{
    public function home()
    {
        return Inertia::render('Admin/Facturacion/Home');
    }
}
