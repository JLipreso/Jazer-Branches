<?php

namespace Jazer\Branches\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Single extends Controller
{
    public static function single($branch_refid) {
        $source = DB::connection("conn_branches")
        ->table("branch")
        ->select("project_refid", "branch_refid", "name", "address", "cover", "description", "geo_lat", "geo_lng", "public", "active", "created_at", "created_by")
        ->where([
            "project_refid"     => config('branchesconfig.project_refid'),
            "branch_refid"      => $branch_refid
        ])
        ->orderBy("name", "asc")
        ->get();

        if(count($source) > 0) {
            return $source[0];
        }
        else {
            return [];
        }
    }
}


