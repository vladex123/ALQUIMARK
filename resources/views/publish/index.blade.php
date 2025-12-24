@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Publicar un producto</h1>
    <!-- Aquí puedes añadir un formulario para publicar productos o un enlace al formulario de creación de productos -->
    <a href="{{ route('products.create') }}" class="btn btn-primary">Crear nuevo producto</a>
</div>
@endsection