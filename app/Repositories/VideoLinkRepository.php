<?php

namespace App\Repositories;


use App\Models\VideoLink;

class VideoLinkRepository extends Repository
{
    protected $model;

    /**
     * VideoLinkRepository constructor.
     * @param VideoLink $model
     */
    public function __construct(VideoLink $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
