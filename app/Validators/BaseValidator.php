<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

abstract class BaseValidator implements ValidatorInterface
{
    protected const RULES = [];

    public function validate(array $data): array
    {
        return Validator::make(
            $data,
            static::RULES,
        )->validate();
    }
}
