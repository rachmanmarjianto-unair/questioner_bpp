<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(session('userdata'));

        $questioner = DB::table('users')
                        ->where('idusers', session('userdata')['idusers'])
                        ->select('sustain_ques', 'esg_ques')
                        ->first();

        

        return view('home', compact('questioner'));
    }
}
