<?php

namespace App\Validators;

use App\Validators\ProductValidatorInterface;

class ProductValidator extends BaseValidator implements ProductValidatorInterface
{
    protected const RULES = [
        'name' => 'required|max:255',
        'product_id' => 'required', # w przypadku tylko trzech id'ków możnaby było użyć tu reguły "in", ale zakładam, że w rzeczywistości tych id byłoby więcej ;)
        'price' => 'required|string', #tu rozważałem również alpha_num, ale przy tej regule nie można używać spacji
        'description' => 'string|nullable',
    ];
}
