<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $data_pemilih = DB::select('SELECT nama_unit_kerja,
                SUM(CASE WHEN join_table = 1 AND sustain_ques is true THEN 1 ELSE 0 END) as sustain_tendik,
                SUM(CASE WHEN join_table = 2 AND sustain_ques is true THEN 1 ELSE 0 END) as sustain_dosen,
                SUM(CASE WHEN join_table = 3 AND sustain_ques is true THEN 1 ELSE 0 END) as sustain_mahasiswa,
                SUM(CASE WHEN join_table = 1 AND esg_ques is true THEN 1 ELSE 0 END) as esg_tendik,
                SUM(CASE WHEN join_table = 2 AND esg_ques is true THEN 1 ELSE 0 END) as esg_dosen,
                SUM(CASE WHEN join_table = 3 AND esg_ques is true THEN 1 ELSE 0 END) as esg_mahasiswa
            FROM "users"
            GROUP BY nama_unit_kerja');

        // dd($data_pemilih);

        return view('admin.home', compact('data_pemilih'));
    }

    public function showLoginForm()
    {


        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($validator = \Validator::make($request->all(), [
            'username' => 'required|numeric',
            'password' => 'required|string|max:255',
        ])->fails()) {
            return back()->with('status', [
                'status' => 'danger',
                'message' => 'Data tidak valid. Silakan periksa kembali input Anda.'
            ]);
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
        CURLOPT_POSTFIELDS => array('LoginForm[username]' => $request->username,'LoginForm[password]' => $request->password),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // echo $response;die;
        
        $data_hasil = json_decode($response, true);

        if($data_hasil['status'] == 'success'){

            date_default_timezone_set('Asia/Jakarta');
            $ts = date('Y-m-d H:i:s'); // Menampilkan waktu Jakarta

            $cek = DB::table('users')
                        ->where('nimnip', $data_hasil['data']['username'])
                        ->where('admin', true)
                        ->get();

            if(count($cek) == 0){
                return back()->with('status', [
                    'status' => 'danger',
                    'message' => 'Username password salah / Anda tidak memiliki akses admin.'
                ]);
            }

            $datauser = array(
                    'idusers' => $cek[0]->idusers,
                    'nimnip' => $cek[0]->nimnip,
                    'nama' => $cek[0]->nama,
                    'join_table' => $cek[0]->join_table,
                    'email' => $cek[0]->email,
                    'id_unit_kerja' => $cek[0]->id_unit_kerja,
                    'nama_unit_kerja' => $cek[0]->nama_unit_kerja,
                    'fakultas' => $cek[0]->fakultas,
                    'gender' => $cek[0]->gender,
                    'internasional' => $cek[0]->internasional,
                    'birth_date' => $cek[0]->birth_date ?? null,
                    'admin' => $cek[0]->admin,
                );

            session(['userdata' => $datauser]);

            return redirect()->route('admin.home');

        }
        else{
            return back()->with('status', [
                    'status' => 'danger',
                    'message' => 'Username password salah / Anda tidak memiliki akses admin.'
                ]);
        }
    }
}
