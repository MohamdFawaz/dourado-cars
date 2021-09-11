<?php

namespace App\Services;

use App\Repositories\VideoLinkRepository;

class VideoLinkService
{
    private $repository;

    public function __construct(VideoLinkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get($cols = ['*'])
    {
        return $this->repository->query()->get($cols);
    }

    public function store($data)
    {
        return $this->repository->create($data);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function update($data, $id)
    {
        $videoLink = $this->repository->find($id);

        $videoLink->link = $data['link'];

        $videoLink->save();

        return $videoLink;
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

}
