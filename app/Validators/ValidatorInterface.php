<?php

namespace App\Validators;

interface ValidatorInterface
{
    public function validate(array $data): array;
}
