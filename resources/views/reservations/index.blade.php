@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Reservas</h1>
    <h2>Reservas que he realizado</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Precio total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userReservations as $reservation)
            <tr>
                <td>{{ $reservation->product->name }}</td>
                <td>{{ $reservation->start_date }}</td>
                <td>{{ $reservation->end_date }}</td>
                <td>${{ $reservation->total_price }}</td>
                <td>{{ $reservation->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Reservas de mis productos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Usuario</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Precio total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productReservations as $reservation)
            <tr>
                <td>{{ $reservation->product->name }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->start_date }}</td>
                <td>{{ $reservation->end_date }}</td>
                <td>${{ $reservation->total_price }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <!-- Aquí puedes añadir botones para aprobar/rechazar reservas -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection