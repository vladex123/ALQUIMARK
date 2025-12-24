<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $userReservations = Auth::user()->reservations()->with('product')->get();
        $productReservations = Reservation::whereHas('product', function ($query) {
            $query->where('user_id', Auth::id());
        })->with(['product', 'user'])->get();

        return view('reservations.index', compact('userReservations', 'productReservations'));
    }
    public function create(Product $product)
    {
        return view('reservations.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $start_date = new \DateTime($validatedData['start_date']);
        $end_date = new \DateTime($validatedData['end_date']);
        $days = $start_date->diff($end_date)->days;

        $total_price = $product->price * $days;

        $reservation = new Reservation([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'total_price' => $total_price,
            'status' => 'pending'
        ]);

        $reservation->save();
        $product->user->notify(new NewReservationNotification($reservation));
        return redirect()->route('reservations.show', $reservation)->with('success', 'Reserva creada exitosamente.');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }
}