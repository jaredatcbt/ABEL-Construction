<?php

namespace App\Http\Controllers;

use App\Abstracts\Http\Controller;
use Carbon\Carbon;
use Illuminate\Http\Response;
use App\Models\Fuel\FuelUsage;
use App\Models\Fuel\FuelVehicle;
use App\Http\Requests\Fuel\VehicleRequest as Request;

class Vehicle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module = 'fuel_vehicle';
        $module_index = '';
        $totalFuelUsed = FuelUsage::whereNotNull('vehicle_id')->sum('quantity');

        // Retrieve fuel usages for the current month
        $vehicles = FuelVehicle::get();

        return $this->response('fuel_vehicle.index', compact('module', 'module_index', 'totalFuelUsed', 'vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $module = 'fuel_vehicle.create';
        $module_index = '';

        return view('fuel_vehicle.create', compact('module', 'module_index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        FuelVehicle::create([
            'name' => $request->name,
            'model' => $request->model,
        ]);

        return redirect()->back();
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('fuel::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $module = 'fuel_vehicle.edit';
        $module_index = '';

        return view('fuel_vehicle.edit', compact('module', 'module_index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        dd($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
