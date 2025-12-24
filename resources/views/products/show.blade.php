@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid mb-3">
    @endif
    <p>{{ $product->description }}</p>
    <p><strong>Precio:</strong> ${{ $product->price }} por {{ $product->period }}</p>
    <p><strong>Categoría:</strong> {{ $product->category }}</p>
    <p><strong>Publicado por:</strong> {{ $product->user->name }}</p>
    
    <div class="mt-3">
        @auth
            <a href="{{ route('reservations.create', $product) }}" class="btn btn-success">Reservar este producto</a>
            
            @if($product->user->phone)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->user->phone) }}?text=Hola, estoy interesado en alquilar el producto '{{ $product->name }}' que vi en Alquimarket." 
                   class="btn btn-primary" target="_blank">
                    <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                </a>
            @endif
        @else
            <p>Debes <a href="{{ route('login') }}">iniciar sesión</a> para reservar este producto o contactar al propietario.</p>
        @endauth
    </div>

    @can('update', $product)
        <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary mt-2">Editar</a>
        <a href="{{ route('reservations.create', $product) }}" class="btn btn-success">Reservar este producto</a>
        @endcan
    
    @can('delete', $product)
        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
        </form>
    @endcan
</div>
@endsection