<?php

namespace App\Http\Controllers;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Fuel\FuelPurchase;

class Buy extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function home()
    {
        $module = 'fuel_buy';
        $module_index = '';

        $latestPurchases = FuelPurchase::latest()->get();

        return $this->response('fuel.buy.index', compact('module', 'module_index', 'latestPurchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function add()
    {
        $module = 'fuel_buy.create';
        $module_index = '';

        return view('fuel.buy.create', compact('module', 'module_index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function view($id)
    {
        return view('fuel::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function change($id)
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
    public function changed(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        //
    }
}
