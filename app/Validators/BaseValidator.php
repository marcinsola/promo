<?php

namespace App\Validators;

use App\Exceptions\RulesNotFound;
use Illuminate\Support\Facades\Validator;

abstract class BaseValidator implements ValidatorInterface
{
    protected const RULES = [];

    public function validate(array $data, string $methodName): array
    {
        return Validator::make(
            $data,
            $this->getRules($methodName),
        )->validate();
    }

    /** @throws RulesNotFound */
    private function getRules(string $methodName): array
    {
        if (!in_array($methodName, array_keys(static::RULES))) {
            throw new RulesNotFound($methodName, get_class($this));
        }

        return static::RULES[$methodName];
    }
}
