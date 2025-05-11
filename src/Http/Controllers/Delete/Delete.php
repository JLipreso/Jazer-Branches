<?php

namespace Jazer\Branches\Http\Controllers\Delete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Delete extends Controller
{
    public static function delete($branch) {
        $deleted = DB::connection("conn_branches")->table("branch")
            ->where([
                "project_refid"     => config('branchesconfig.project_refid'),
                "branch_refid"      => $branch
            ])
            ->delete();

        if($deleted) {
            return [
                "success"   => true
            ];
        }
        else {
            return [
                "success"   => false
            ];
        }
    }
}