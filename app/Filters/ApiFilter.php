<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter{
    protected $safeParms = [];
    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request){
        $eloQuery = [ ];

        foreach($this->safeParms as $parm => $operators)
        {
            $query = $request->query($parm);

            if (!isset($query))
            {
                continue;
            }

            $colum = $this->columnMap[$parm] ?? $parm;

            foreach($operators as $operator)
            {
                if(isset($query[$operator]))
                {
                    $eloQuery[] = [$colum, $operator, $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}