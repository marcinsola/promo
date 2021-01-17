<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;
use Jenssegers\Mongodb\Eloquent\Model;

abstract class BaseService
{
    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public abstract function create(array $attributes): Model;
}
