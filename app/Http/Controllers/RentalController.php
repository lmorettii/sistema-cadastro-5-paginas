
<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['vehicle','customer'])->orderBy('created_at','desc')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $vehicles = Vehicle::where('status','available')->get();
        $customers = Customer::orderBy('name')->get();
        return view('rentals.create', compact('vehicles','customers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'customer_id' => 'required|exists:customers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $vehicle = Vehicle::findOrFail($data['vehicle_id']);

        // calculate days and price
        $start = Carbon::parse($data['start_date']);
        $end = Carbon::parse($data['end_date']);
        $days = $start->diffInDays($end) + 1;
        $daily = $vehicle->daily_rate;
        $total = $days * $daily;

        $rental = Rental::create([
            'vehicle_id' => $vehicle->id,
            'customer_id' => $data['customer_id'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'daily_rate' => $daily,
            'total_days' => $days,
            'total_price' => $total,
            'status' => 'reserved',
        ]);

        // mark vehicle as rented
        $vehicle->status = 'rented';
        $vehicle->save();

        return redirect()->route('rentals.index')->with('success','Locação registrada.');
    }

    public function show(Rental $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    public function finish(Rental $rental)
    {
        $rental->status = 'finished';
        $rental->save();
        $vehicle = $rental->vehicle;
        $vehicle->status = 'available';
        $vehicle->save();

        return redirect()->back()->with('success','Locação finalizada.');
    }
}
