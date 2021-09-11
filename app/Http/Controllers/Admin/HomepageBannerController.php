<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageBanner;
use App\Services\HomepageBannerService;
use Illuminate\Http\Request;

class HomepageBannerController extends Controller
{
    private $service;

    public function __construct(HomepageBannerService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $banners = $this->service->get();
        return view('admin.homepage_banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.homepage_banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->service->store($request);
        return redirect()->to(route('homepage_banner.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomepageBanner  $homepageBanner
     * @return \Illuminate\Http\Response
     */
    public function show(HomepageBanner $homepageBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomepageBanner  $homepageBanner
     */
    public function edit($id)
    {
        $banner = $this->service->find($id);
        return view('admin.homepage_banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomepageBanner  $homepageBanner
     */
    public function update($id, Request $request)
    {
        $this->service->update($request, $id);
        return redirect()->to(route('homepage_banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomepageBanner  $homepageBanner
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->to(route('homepage_banner.index'));
    }
}
