@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Publicar un nuevo producto para alquilar</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="period" class="form-label">Periodo</label>
            <select class="form-control" id="period" name="period" required>
                <option value="hora">Por hora</option>
                <option value="dia">Por día</option>
                <option value="semana">Por semana</option>
                <option value="mes">Por mes</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <select class="form-control" id="category" name="category" required>
                <option value="propiedades">Propiedades</option>
                <option value="vehiculos">Vehículos</option>
                <option value="herramientas">Herramientas</option>
                <option value="electronicos">Electrónicos</option>
                <option value="eventos">Eventos</option>
                <option value="deportes">Deportes</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen del producto</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Publicar producto</button>
    </form>
</div>
@endsection