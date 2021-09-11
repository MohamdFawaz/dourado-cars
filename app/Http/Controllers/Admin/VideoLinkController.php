<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageBanner;
use App\Services\HomepageBannerService;
use App\Services\VideoLinkService;
use Illuminate\Http\Request;

class VideoLinkController extends Controller
{
    private $service;

    public function __construct(VideoLinkService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $links = $this->service->get();
        return view('admin.video_link.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.video_link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->service->store($request->all());
        return redirect()->to(route('video_link.index'));
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
        $link = $this->service->find($id);
        return view('admin.video_link.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomepageBanner  $homepageBanner
     */
    public function update($id, Request $request)
    {
        $this->service->update($request->all(), $id);
        return redirect()->to(route('video_link.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomepageBanner  $homepageBanner
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->to(route('video_link.index'));
    }
}
