<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters;
use App\Filters\ApiFilter;

class ScheduleFilter extends ApiFilter{
    protected $safeParms = 
    [
        'dayname' => ['eq'],
        'starttime' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'endtime' => ['eq', 'lt', 'gt', 'lte', 'gte'],
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