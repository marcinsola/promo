<?php

namespace App\Repositories;

use Jenssegers\Mongodb\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
}
