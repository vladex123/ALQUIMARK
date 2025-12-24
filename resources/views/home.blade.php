@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h2 class="card-title">LOS MÁS ALQUILADOS</h2>
                    <div id="featuredCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($featuredProducts as $index => $product)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <img src="{{ asset('images/' . $product['image']) }}" class="d-block w-100" alt="{{ $product['name'] }}">
                                        </div>
                                        <div class="col-md-6">
                                            <h3>{{ $product['name'] }}</h3>
                                            <a href="{{ route('product.show', $product['id']) }}" class="btn btn-light mt-3">Ver detalles</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center mb-4">Categorías principales</h2>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4 col-lg-2 mb-4">
                        <a href="{{ route($category['route']) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="fas {{ $category['icon'] }} fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title">{{ $category['name'] }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center mb-4">Beneficios de Alquimarket</h2>
            <div class="row">
                @foreach($benefits as $benefit)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas {{ $benefit['icon'] }} fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">{{ $benefit['title'] }}</h5>
                                <p class="card-text">{{ $benefit['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- En la sección de productos destacados -->
    <div class="row mt-5">
    <div class="col-12">
        <h2 class="text-center mb-4">Productos Destacados</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->price }} € / {{ $product->period }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Ver todos los productos</a>
</div>
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center mb-4">Cómo funciona Alquimarket</h2>
            <div class="row">
                @foreach($howItWorks as $step)
                    <div class="col-md-2 mb-4 {{ $loop->first ? 'offset-md-1' : '' }}">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas {{ $step['icon'] }} fa-2x"></i>
                                </div>
                                <h5 class="card-title">{{ $step['title'] }}</h5>
                                <p class="card-text">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection