<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function properties()
    {
        return view('categories.properties');
    }

    public function vehicles()
    {
        return view('categories.vehicles');
    }

    public function tools()
    {
        return view('categories.tools');
    }

    public function electronics()
    {
        return view('categories.electronics');
    }

    public function events()
    {
        return view('categories.events');
    }

    public function sports()
    {
        return view('categories.sports');
    }
}