<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters;
use App\Filters\ApiFilter;


class AbsenceFilter extends ApiFilter{
    protected $safeParms = 
    [
        'absence' => ['eq'],
        'startdate' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'enddate' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        
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