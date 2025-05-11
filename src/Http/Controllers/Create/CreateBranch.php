<?php

namespace Jazer\Branches\Http\Controllers\Create;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CreateBranch extends Controller
{
    public static function create(Request $request) {
        if($request['name'] == '') {
            return [
                "success"   => false,
                "message"   => "Name is required"
            ];
        }
        else if($request['address'] == '') {
            return [
                "success"   => false,
                "message"   => "Address is required"
            ];
        }
        else if($request['geo_lat'] == '') {
            return [
                "success"   => false,
                "message"   => "Geolocation's latitude is required"
            ];
        }
        else if($request['geo_lng'] == '') {
            return [
                "success"   => false,
                "message"   => "Geolocation's longitude is required"
            ];
        }
        else {
            $created = DB::connection("conn_branches")->table("branch")
            ->insert([
                "project_refid" => config('branchesconfig.project_refid'),
                "branch_refid"  => \Jazer\Branches\Http\Controllers\Utility\ReferenceID::create('BCH'),
                "name"          => $request['name'],
                "address"       => $request['address'],
                "cover"         => $request['cover'],
                "geo_lat"       => $request['geo_lat'],
                "geo_lng"       => $request['geo_lng'],
                "created_by"    => $request['created_by']
            ]);

            if($created) {
                return [
                    "success"   => true,
                    "message"   => "Branch created successfully"
                ];
            }
            else {
                return [
                    "success"   => false,
                    "message"   => "Fail to create branch"
                ];
            }
        }
    }
}