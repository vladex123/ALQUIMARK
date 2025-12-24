@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar producto</h1>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="period" class="form-label">Periodo</label>
            <select class="form-control" id="period" name="period" required>
                <option value="hora" {{ $product->period == 'hora' ? 'selected' : '' }}>Por hora</option>
                <option value="dia" {{ $product->period == 'dia' ? 'selected' : '' }}>Por día</option>
                <option value="semana" {{ $product->period == 'semana' ? 'selected' : '' }}>Por semana</option>
                <option value="mes" {{ $product->period == 'mes' ? 'selected' : '' }}>Por mes</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Propiedades" {{ $product->category == 'Propiedades' ? 'selected' : '' }}>Propiedades</option>
                <option value="Vehículos" {{ $product->category == 'Vehículos' ? 'selected' : '' }}>Vehículos</option>
                <option value="Herramientas" {{ $product->category == 'Herramientas' ? 'selected' : '' }}>Herramientas</option>
                <option value="Electrónicos" {{ $product->category == 'Electrónicos' ? 'selected' : '' }}>Electrónicos</option>
                <option value="Eventos" {{ $product->category == 'Eventos' ? 'selected' : '' }}>Eventos</option>
                <option value="Deportes" {{ $product->category == 'Deportes' ? 'selected' : '' }}>Deportes</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen del producto</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar producto</button>
    </form>
</div>
@endsection