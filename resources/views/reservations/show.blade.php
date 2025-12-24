@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Reserva</h1>
    <p><strong>Producto:</strong> {{ $reservation->product->name }}</p>
    <p><strong>Fecha de inicio:</strong> {{ $reservation->start_date }}</p>
    <p><strong>Fecha de fin:</strong> {{ $reservation->end_date }}</p>
    <p><strong>Precio total:</strong> ${{ $reservation->total_price }}</p>
    <p><strong>Estado:</strong> {{ $reservation->status }}</p>
</div>
@endsection