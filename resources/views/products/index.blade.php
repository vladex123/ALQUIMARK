@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Productos disponibles para alquilar</h1>
    <form action="{{ route('products.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar productos..." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $product->price }} / {{ $product->period }}</p>
                        <p class="card-text"><strong>Categoría:</strong> {{ $product->category }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection