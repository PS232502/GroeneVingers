<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AdressFilter extends ApiFilter{
    protected $safeParms = 
    [
        'city' => ['eq'],
        'postalcode' => ['eq', 'gt', 'lt',],
        'street' => ['eq'],
        'housenumber' => ['eq'],
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