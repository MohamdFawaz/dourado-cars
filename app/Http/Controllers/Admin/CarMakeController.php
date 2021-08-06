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
     */
    public function index()
    {
        $carMakes = $this->carMakeService->get();
        return view('admin.car_make.index', ['car_makes' => $carMakes]);
    }

    /**
     * Show the form for creating a new resource.
     **/
    public function create()
    {
        return view('admin.car_make.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $this->carMakeService->store($request);
        return \request()->route('car-make.index');
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
        $carMake = $this->carMakeService->findById($id);
        return view('admin.car_make.edit', ['car_make' => $carMake]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $carMake = $this->carMakeService->findById($id);
        $this->carMakeService->update($request, $carMake);
        return redirect()->to(route('car-make.index'));
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

    public function toggleActivation(Request $request)
    {
        try {
            $this->carMakeService->toggleActivation($request->car_make_id);
        } catch (\Exception $e) {
            return $this->errorJsonResponse($e);
        }
    }
}
