<?php

namespace App\Http\Controllers;

use App\Abstracts\Http\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Fuel\FuelGenerator;
use App\Models\Fuel\FuelPurchase;
use App\Models\Fuel\FuelUsage;
use App\Models\Fuel\FuelVehicle;

class Usage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module = 'fuel_usage';
        $module_index = '';
        $totalFuelPurchased = FuelPurchase::sum('quantity');
        $totalFuelUsed = FuelUsage::sum('quantity');
        $currentFuelStock = $totalFuelPurchased - $totalFuelUsed;


        $currentMonth = Carbon::now()->format('Y-m');

        // Retrieve fuel usages for the current month
        $fuelUsages = FuelUsage::whereYear('usage_date', '=', Carbon::now()->year)
            ->whereMonth('usage_date', '=', Carbon::now()->month)
            ->get();

        // Retrieve fuel purchases for the current month
        $fuelPurchases = FuelPurchase::whereYear('purchase_date', '=', Carbon::now()->year)
            ->whereMonth('purchase_date', '=', Carbon::now()->month)
            ->get();

        $total_Vehicles = FuelVehicle::count();
        $total_Generators = FuelGenerator::count();

        // Merge fuel usages and fuel purchases into a single array
        $fuelTransactions = $fuelUsages->map(function ($usage) {
            return [
                'id' => $usage->id,
                'date' => $usage->usage_date,
                'vendor' => '',
                'used_by' => (!empty($usage->vehicle_id)? $usage->vehicle->name: (!empty($usage->generator_id)? $usage->generator->make: '')),
                'quantity' => '-'.$usage->quantity.'ℓ',
                'textcolor' => 'text-red-important',
            ];
        })->concat($fuelPurchases->map(function ($purchase) {
            return [
                'id' => $purchase->id,
                'date' => $purchase->purchase_date,
                'vendor' => (!empty($purchase->contact_id)? $purchase->vendor->name: ''),
                'used_by' => '',
                'quantity' => '+'.$purchase->quantity.'ℓ',
                'textcolor' => 'text-green-important',
            ];
        }));

        return $this->response('fuel_usage.index', compact('module', 'module_index', 'currentFuelStock', 'total_Vehicles', 'total_Generators', 'fuelTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('fuel::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        return view('fuel::edit');
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
        //
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
