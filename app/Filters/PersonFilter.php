<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters;
use App\Filters\ApiFilter;

class PersonFilter extends ApiFilter{
    protected $safeParms = 
    [
        'firstname' => ['eq'],
        'lastname' => ['eq'],
        'dateofbirth' => ['eq'],
        'function' => ['eq'],
    ];

    protected $columnMap = [];

    protected $operatorMap = 
    [
        'eq' => '=',
        'lt' => '<', 
        'lte' => '≤', 
        'gt' => '>', 
        'gte' => '≥',  
    ];

}