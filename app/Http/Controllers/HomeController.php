<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; 

class HomeController extends Controller
{
    public function index()
{
    $featuredProducts = Product::inRandomOrder()->take(3)->get();

    $categories = [
        ['name' => 'Propiedades', 'icon' => 'fa-home', 'route' => 'category.properties'],
        ['name' => 'Vehículos', 'icon' => 'fa-car', 'route' => 'category.vehicles'],
        ['name' => 'Herramientas', 'icon' => 'fa-tools', 'route' => 'category.tools'],
        ['name' => 'Electrónicos', 'icon' => 'fa-laptop', 'route' => 'category.electronics'],
        ['name' => 'Eventos', 'icon' => 'fa-calendar', 'route' => 'category.events'],
        ['name' => 'Deportes', 'icon' => 'fa-futbol', 'route' => 'category.sports'],
    ];

    $benefits = [
        ['icon' => 'fa-user', 'title' => 'Ingresa a tu cuenta', 'description' => 'Gestiona tus alquileres'],
        ['icon' => 'fa-map-marker-alt', 'title' => 'Ingresa tu ubicación', 'description' => 'Encuentra alquileres cercanos'],
        ['icon' => 'fa-tags', 'title' => 'Precios accesibles', 'description' => 'Descubre opciones económicas'],
        ['icon' => 'fa-shield-alt', 'title' => 'Alquiler protegido', 'description' => 'Garantías para arrendadores y arrendatarios'],
        ['icon' => 'fa-check-circle', 'title' => 'Propietarios verificados', 'description' => 'Mayor seguridad en tus alquileres'],
        ['icon' => 'fa-question-circle', 'title' => '¿Necesitas ayuda?', 'description' => 'Soporte al cliente'],
    ];

    $howItWorks = [
        ['step' => 1, 'title' => 'Busca', 'description' => 'Encuentra el artículo que necesitas alquilar.', 'icon' => 'fa-search'],
        ['step' => 2, 'title' => 'Reserva', 'description' => 'Selecciona las fechas y haz tu reserva.', 'icon' => 'fa-calendar-check'],
        ['step' => 3, 'title' => 'Recoge', 'description' => 'Recoge el artículo en la ubicación acordada.', 'icon' => 'fa-hand-holding'],
        ['step' => 4, 'title' => 'Disfruta', 'description' => 'Usa el artículo durante el tiempo acordado.', 'icon' => 'fa-smile'],
        ['step' => 5, 'title' => 'Devuelve', 'description' => 'Devuelve el artículo en las mismas condiciones.', 'icon' => 'fa-undo'],
    ];

    return view('home', compact('featuredProducts', 'categories', 'benefits', 'howItWorks'));
}
}