<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function show($slug)
    {
        // Aquí puedes añadir la lógica para mostrar la página de cada beneficio
        return view('benefits.show', ['slug' => $slug]);
    }
}