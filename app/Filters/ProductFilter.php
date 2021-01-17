<?php

namespace App\Filters;

use App\Models\Product;
use Jenssegers\Mongodb\Eloquent\Builder;

class ProductFilter extends BaseFilter implements ProductFilterInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    protected function colors(array $values): void
    {
        $this->multiOption(__FUNCTION__, $values);
    }

    protected function sizes(array $values): void
    {
        $this->multiOption(__FUNCTION__, $values);
    }

    private function multiOption(string $fieldName, array $values): void
    {
        $this->query->where(function (Builder $query) use ($fieldName, $values) {
            while (!empty($values)) {
                $query->orWhere($fieldName, 'like', sprintf('%%%s%%', array_pop($values)));
            }
        });
    }
}
