<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $data_pemilih = DB::select('SELECT nama_unit_kerja, id_unit_kerja,
                SUM(CASE WHEN join_table = 1 AND sustain_ques is true THEN 1 ELSE 0 END) as sustain_tendik,
                SUM(CASE WHEN join_table = 2 AND sustain_ques is true THEN 1 ELSE 0 END) as sustain_dosen,
                SUM(CASE WHEN join_table = 3 AND sustain_ques is true THEN 1 ELSE 0 END) as sustain_mahasiswa,
                SUM(CASE WHEN join_table = 1 AND esg_ques is true THEN 1 ELSE 0 END) as esg_tendik,
                SUM(CASE WHEN join_table = 2 AND esg_ques is true THEN 1 ELSE 0 END) as esg_dosen,
                SUM(CASE WHEN join_table = 3 AND esg_ques is true THEN 1 ELSE 0 END) as esg_mahasiswa
            FROM "users"
            GROUP BY nama_unit_kerja, id_unit_kerja
            ORDER BY nama_unit_kerja ASC');

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

    public function logout()
    {
        \Illuminate\Support\Facades\Auth::logout();
        \Illuminate\Support\Facades\Session::flush();
        return redirect('/admin_login')->with('status', [
            'status' => 'success',
            'message' => 'Anda telah logout.'
        ]);
    }

    public function dataquestioner($ques, $unit_kerja)
    {
        if($ques == 1){
            $jenis_ques = $ques;
            $nama_ques = 'Sustainability';
        }
        else if($ques == 2){
            $jenis_ques = $ques;
            $nama_ques = 'ESG';
        }
        else{
            return back()->with('status', [
                'status' => 'danger',
                'message' => 'Jenis questioner tidak valid.'
            ]);
        }

        /*
        *   untuk mendapatkan data uniq pertanyaan pada kolom dan nama pada baris, diperlukan data uniq untuk setiap pertanyaan
        *   data uniq pertanyaan ini ada didapat dari kombinasi jenis_ques, idkumpulan_pertanyaan, nomor_ques
        *   untuk dapat idkumpul_pertanyaan ini, didapat dari tabel pengelompokan. kombinasi dari jenis_ques, sesi dan join_table
        *   karena jenis_ques ini dijadikan filter, maka pada semua array dibawah jenis_ques tidak ada. 
        */


        $kelompok = DB::table('pengelompokan')
                        ->where('jenis_ques', $jenis_ques)
                        ->orderBy('idpengelompokan', 'asc')
                        ->get();

        /*
        *   $map_idkumpulan[join_table][sesi] = idkumpulan_pertanyaan
        *
        */
        $map_idkumpulan = array();
        foreach($kelompok as $k){
            if(!array_key_exists($k->join_table, $map_idkumpulan)){
                $map_idkumpulan[$k->join_table] = array();
            }
            $map_idkumpulan[$k->join_table][$k->sesi] = $k->idkumpulan_pertanyaan;
        }

        $jawaban_user = DB::table('jawaban as j')
                        ->join('users as u', 'j.idusers', '=', 'u.idusers')
                        ->where('j.jenis_ques', $jenis_ques)
                        ->where('u.id_unit_kerja', $unit_kerja)
                        ->select('u.idusers', 'u.nama', 'u.nimnip', 'u.join_table', 'u.email', 'u.nama_unit_kerja', 'u.id_unit_kerja', 'u.fakultas', 'u.internasional', 
                                'u.gender', 'u.birth_date', 'u.sustain_ques', 'u.esg_ques',
                                'j.jenis_ques', 'j.sesi', 'j.nomor_ques', 'j.jawab')
                        ->get();

        
        $data_jawaban = array();
        foreach($jawaban_user as $ju){
            if(!array_key_exists($ju->idusers, $data_jawaban)){
                if($ju->join_table == 1){
                    $tipeuser = 'tendik';
                }
                else if($ju->join_table == 2){
                    $tipeuser = 'dosen';
                }
                else{
                    $tipeuser = 'mahasiswa';
                }

                if($ju->gender == 1){
                    $gender = 'Laki-laki';
                }
                else if($ju->gender == 2){
                    $gender = 'Perempuan';
                }
                else{
                    $gender = 'Lainnya';
                }

                $data_jawaban[$ju->idusers] = array(
                    'nama' => $ju->nama,
                    'nimnip' => $ju->nimnip,
                    'join_table' => $ju->join_table,
                    'tipeuser' => $tipeuser,
                    'email' => $ju->email,
                    'nama_unit_kerja' => $ju->nama_unit_kerja,
                    'id_unit_kerja' => $ju->id_unit_kerja,
                    'fakultas' => $ju->fakultas,
                    'internasional' => $ju->internasional,
                    'gender' => $gender,
                    'birth_date' => $ju->birth_date ?? null,
                    'sustain_ques' => $ju->sustain_ques,
                    'esg_ques' => $ju->esg_ques,
                    'jawaban' => array()
                );

                $unit_kerja = $ju->nama_unit_kerja;
            }

            //idkelompok_pertanyaan adalah kombinasi dari sesi dan join_table
            $idkumpul_pertanyaan = $map_idkumpulan[$ju->join_table][$ju->sesi];
            if(!array_key_exists($idkumpul_pertanyaan, $data_jawaban[$ju->idusers]['jawaban'])){
                $data_jawaban[$ju->idusers]['jawaban'][$idkumpul_pertanyaan] = array();
            }

            $data_jawaban[$ju->idusers]['jawaban'][$idkumpul_pertanyaan][$ju->nomor_ques] = $ju->jawab;
        }

        $pertanyaan_q = DB::table('kumpulan_pertanyaan as kp')
                        ->join('pertanyaan as p', 'kp.idkumpulan_pertanyaan', '=', 'p.idkumpulan_pertanyaan')
                        ->where('kp.jenis_ques', $jenis_ques)
                        ->orderBy('kp.idkumpulan_pertanyaan', 'asc')
                        ->orderBy('p.nomor_ques', 'asc')
                        ->select('kp.idkumpulan_pertanyaan', 'p.nomor_ques', 'p.pertanyaan')
                        ->get();

        
        $pertanyaan = array();
        foreach($pertanyaan_q as $pq){
            if(!array_key_exists($pq->idkumpulan_pertanyaan, $pertanyaan)){
                $pertanyaan[$pq->idkumpulan_pertanyaan] = array();
            }
            $pertanyaan[$pq->idkumpulan_pertanyaan][$pq->nomor_ques] = $pq->pertanyaan;
        }

        $pertanyaan_2 = $pertanyaan;

        // dd($data_jawaban, $pertanyaan);

        return view('admin.dataquestioner', compact('data_jawaban', 'jenis_ques', 'pertanyaan', 'nama_ques', 'unit_kerja', 'pertanyaan_2'));
    }
}
