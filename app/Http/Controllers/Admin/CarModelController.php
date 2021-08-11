<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarModel;
use App\Services\CarModelService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class CarModelController extends Controller
{

    private $carModelService;

    public function __construct(CarModelService $carModelService)
    {
        $this->carModelService = $carModelService;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $carModels = $this->carModelService->get();
        return view('admin.car_model.index', ['car_models' => $carModels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $carMakes = $this->carModelService->carMakeService->getActivated();
        return view('admin.car_model.create', ['car_makes' => $carMakes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->carModelService->store($request);
        return redirect()->to(route('car-model.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param CarModel $carModel
     * @return Response
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $carModel = $this->carModelService->findById($id);
        $carMakes = $this->carModelService->carMakeService->getActivated();
        return view('admin.car_model.edit', ['car_makes' => $carMakes, 'car_model' => $carModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, Request $request)
    {
        $carModel = $this->carModelService->findById($id);
        $this->carModelService->update($request, $carModel);
        return redirect()->to(route('car-model.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->carModelService->destroy($id);
        return redirect()->to(route('car-model.index'));
    }

    public function getCarMakeModels($carMakeId)
    {
        $carMakeModels = $this->carModelService->getModelsByCarMake($carMakeId);
        return \response()->json(['data' => $carMakeModels]);
    }
}
