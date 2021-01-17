<?php

namespace App\Providers;

use App\Filters\ProductFilter;
use App\Filters\ProductFilterInterface;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductFilterInterface::class, ProductFilter::class);
    }
}
