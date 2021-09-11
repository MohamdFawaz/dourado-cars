<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarMake;
use App\Services\CarGalleryService;
use App\Services\CarService;
use App\Services\PanoramicCarService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PanoramicCarController extends Controller
{
    private $service;

    public function __construct(PanoramicCarService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $cars = $this->service->get();
        return view('admin.panoramic_car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     **/
    public function create()
    {
        return view('admin.panoramic_car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->service->store($request);
        return redirect()->to(route('panoramic_car.index'));
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
     */
    public function edit($id)
    {
        $car = $this->service->findById($id);
        return view('admin.panoramic_car.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update($id, Request $request)
    {
        $car = $this->service->update($request, $id);
        return redirect()->to(route('panoramic_car.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CarMake $carMake
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->to(route('panoramic_car.index'));
    }

}
