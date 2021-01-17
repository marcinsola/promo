<?php

namespace App\Filters;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Jenssegers\Mongodb\Eloquent\Builder;

abstract class BaseFilter implements FilterInterface
{
    protected Builder $query;

    public function __construct(Model $model)
    {
        $this->query = $model->query();
    }

    public function filter(array $data): Collection
    {
        foreach ($data as $key => $values) {
            if (!method_exists($this, $key)) {
                continue;
            }

            $this->$key($values);
        }

        return $this->query->get();
    }
}
