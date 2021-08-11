<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarMake;
use App\Services\CarGalleryService;
use App\Services\CarService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CarController extends Controller
{
    private $carService, $carGalleryService;

    public function __construct(CarService $carService, CarGalleryService $carGalleryService)
    {
        $this->carService = $carService;
        $this->carGalleryService = $carGalleryService;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $cars = $this->carService->get();
        return view('admin.car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     **/
    public function create()
    {

        $carMakes = $this->carService->carMakeService->getActivated();
        $carModels = $this->carService->carModelService->get();
        return view('admin.car.create', ['car_makes' => $carMakes, 'car_models' => $carModels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $car = $this->carService->store($request);
            $this->carGalleryService->storeBulkImages($car->id, $request->car_gallery);
            \DB::commit();
            return redirect()->to(route('car.index'));
        }catch (\Exception $e) {
            reportException($e);
            \DB::rollBack();
            reportException($e);
            return redirect()->to(route('car.index'));
        }
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
        $car = $this->carService->findByIdWithGallery($id);
        $carMakes = $this->carService->carMakeService->getActivated();
        $carModels = $this->carService->carModelService->getModelsByCarMake($car->car_make_id);
        return view('admin.car.edit', ['car' => $car, 'car_makes' => $carMakes, 'car_models' => $carModels]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update($id, Request $request)
    {
        $car = $this->carService->update($request, $id);
        $this->carGalleryService->storeBulkImages($id, $request->car_gallery);
        return redirect()->to(route('car.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CarMake $carMake
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->carService->destroy($id);
        return redirect()->to(route('car.index'));
    }

    public function toggleActivation(Request $request)
    {
        try {
            $this->carService->toggleActivation($request->car_make_id);
        } catch (\Exception $e) {
            return $this->errorJsonResponse($e);
        }
    }
}
