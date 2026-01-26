<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $clientIp = $request->ip();

        $whitelist =['127.0.0.1'];

        if(!in_array($clientIp, $whitelist)){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if(!$request->has('nimnip')){
            return response()->json(['message' => 'Parameter nimnip diperlukan.'], 400);
        }

        $query = DB::table('users')
                ->where('nimnip', $request->nimnip)
                ->first();

        
        if($query){
            $flag = true;

            if($query->sustain_ques == false){
                $flag = false;
            }

            if($query->esg_ques == false){
                $flag = false;
            }

            return response()->json([
                'code' => 200,
                'data' => $flag
            ], 200);
        }
        else{
            return response()->json([
                'code' => 404,
                'data' => false
            ], 404);
        }

        return response()->json(['message' => 'API Controller works!']);
    }
}
