<?php

namespace Jazer\Branches\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Paginate extends Controller
{
    public static function paginate(Request $request) {

        if((isset($request['where'])) && ($request['where'] !== null )) {
            return DB::connection("conn_branches")
            ->table("branch")
            ->select("project_refid", "branch_refid", "name", "address", "cover", "description", "geolocation", "public", "active", "created_at", "created_by")
            ->where([
                "project_refid"     => config('branchesconfig.project_refid')
            ])
            ->where(json_decode($request['where']))
            ->orderBy("name", "ASC")
            ->paginate(config('branchesconfig.fetch_paginate_max'));
        }
        else {
            return DB::connection("conn_branches")
            ->table("branch")
            ->select("project_refid", "branch_refid", "name", "address", "cover", "description", "geo_lat", "geo_lng", "public", "active", "created_at", "created_by")
            ->where([
                "project_refid"     => config('branchesconfig.project_refid')
            ])
            ->orderBy("name", "ASC")
            ->paginate(config('branchesconfig.fetch_paginate_max'));
        }
    }
}