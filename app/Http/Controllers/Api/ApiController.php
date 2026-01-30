<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        // $clientIp = $request->ip();

        // $whitelist =['127.0.0.1'];

        // if(!in_array($clientIp, $whitelist)){
        //     return response()->json(['message' => 'Unauthorized'], 403);
        // }

        if(!$request->has('nimnip')){
            return response()->json(['message' => 'Parameter nimnip diperlukan.'], 400);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apicybercampus.unair.ac.id/api/auth/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('LoginForm[username]' => $request->nimnip,'LoginForm[password]' => 'cyber2017v2'),
        CURLOPT_HTTPHEADER => array(
            'Cookie: _csrf=966bef109003f61fb6d2ec5a8492d79f9f8af900c693bff81c9b6091eb11179fa%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22bkUgvl-aroXYv6BuzbospaRfvvxCZ5On%22%3B%7D; uacc-session=pbogk4vo0bs2og4u229f25b6dm'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);
        
        if($response['status'] == 'success'){
            if($response['data']['join_table'] == 4){
                dd($response);
                return response()->json([
                    'code' => 200,
                    'data' => true
                ], 200);
            }
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
