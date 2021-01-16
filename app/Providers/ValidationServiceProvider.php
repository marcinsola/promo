<?php

namespace App\Providers;

use App\Validators\ProductValidator;
use Illuminate\Support\ServiceProvider;
use App\Validators\ProductValidatorInterface;

class ValidationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductValidatorInterface::class, ProductValidator::class);
    }
}
