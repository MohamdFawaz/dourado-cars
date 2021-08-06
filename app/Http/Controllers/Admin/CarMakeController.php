<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarMake;
use App\Services\CarMakeService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CarMakeController extends Controller
{
    private $carMakeService;

    public function __construct(CarMakeService $carMakeService)
    {
        $this->carMakeService = $carMakeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CarMake $carMake
     * @return \Illuminate\Http\Response
     */
    public function show(CarMake $carMake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CarMake $carMake
     * @return \Illuminate\Http\Response
     */
    public function edit(CarMake $carMake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarMake $carMake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarMake $carMake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CarMake $carMake
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarMake $carMake)
    {
        //
    }
}
