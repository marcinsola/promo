<?php

namespace App\Repositories;

use Jenssegers\Mongodb\Eloquent\Model;

interface RepositoryInterface
{
    public function create(array $attributes): Model;
}
