<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'period' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = new Product($request->all());
        $product->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.show', $product)->with('success', 'Producto publicado exitosamente.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function index(Request $request)
    {
        $query = Product::with('user');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }
    
        $products = $query->paginate(12);
    
        return view('products.index', compact('products'));
    }
    public function edit(Product $product)
{
    $this->authorize('update', $product);
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $this->authorize('update', $product);
    
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'period' => 'required',
        'category' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $product->update($validatedData);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
        $product->save();
    }

    return redirect()->route('products.show', $product)->with('success', 'Producto actualizado exitosamente.');
}

public function destroy(Product $product)
{
    $this->authorize('delete', $product);
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
}
}