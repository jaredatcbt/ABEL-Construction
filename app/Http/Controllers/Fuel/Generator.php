<?php

namespace App\Http\Controllers;

use App\Abstracts\Http\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Fuel\FuelGenerator;
use App\Models\Fuel\FuelPurchase;
use App\Models\Fuel\FuelUsage;

class Generator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module = 'fuel_generator';
        $module_index = '';
        $totalFuelUsed = FuelUsage::whereNotNull('generator_id')->sum('quantity');

        // Retrieve fuel usages for the current month
        $generators = FuelGenerator::get();

        return $this->response('fuel_generator.index', compact('module', 'module_index', 'totalFuelUsed', 'generators'));
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
