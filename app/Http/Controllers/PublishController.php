<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function index()
    {
        // Aquí puedes añadir la lógica para mostrar la página de publicación
        return view('publish.index');
    }
}