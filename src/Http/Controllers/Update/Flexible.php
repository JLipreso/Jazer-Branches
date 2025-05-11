<?php

namespace Jazer\Branches\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Flexible extends Controller
{
    public static function update(Request $request) {

        $editColumn         = $request['columns'];
        $counts             = count($editColumn);
        $valuePerQuery      = 1 / $counts;
        $score              = 0;

        for($i = 0; $i < $counts; $i++) {
            $source = DB::connection("conn_branches")->table("branch")
            ->where([
                "project_refid"     => config('branchesconfig.project_refid'),
                "branch_refid"      => $request['branch_refid']
            ])
            ->update($editColumn[$i]);

            if($updated) {
                $score = $score + $valuePerQuery;
            }
        }

        if($score > 0) {
            return [
                "success" => true,
                "score"   => $score,
            ];
        }
        else {
            return [
                "success" => false,
                "score"   => $score
          ];
        }

        
    }
}