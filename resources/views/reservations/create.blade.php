@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservar {{ $product->name }}</h1>
    <form action="{{ route('reservations.store', $product) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha de inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Fecha de fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Reserva</button>
    </form>
</div>
@endsection