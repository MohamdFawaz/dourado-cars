<?php

namespace App\Services;

use App\Repositories\HomepageBannerRepository;

class HomepageBannerService
{
    private $repository;

    public function __construct(HomepageBannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get()
    {
        return $this->repository->query()->get();
    }

    public function store($request)
    {
        return $this->repository->store($request);
    }

    public function update($request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
