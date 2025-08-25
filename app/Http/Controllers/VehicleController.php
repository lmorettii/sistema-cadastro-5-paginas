
<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('created_at','desc')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plate' => 'required|unique:vehicles,plate',
            'make' => 'required',
            'model' => 'required',
            'year' => 'nullable|integer',
            'daily_rate' => 'required|numeric',
        ]);

        Vehicle::create($data);

        return redirect()->route('vehicles.index')->with('success','Veículo cadastrado.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'plate' => 'required|unique:vehicles,plate,' . $vehicle->id,
            'make' => 'required',
            'model' => 'required',
            'year' => 'nullable|integer',
            'daily_rate' => 'required|numeric',
        ]);

        $vehicle->update($data);
        return redirect()->route('vehicles.index')->with('success','Veículo atualizado.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success','Veículo removido.');
    }
}
