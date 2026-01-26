<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;





class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('template.login');
    }

    public function login(Request $request) {
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
                        ->get();

            if(empty($data_hasil['data']['fakultas']) || is_null($data_hasil['data']['fakultas']) || $data_hasil['data']['fakultas'] == 0){
                $fakultas = false;
            }
            else{
                $fakultas = true;
            }

            $internasional = false;
            if($data_hasil['data']['join_table'] == 3){
                if($data_hasil['data']['mahasiswa']['ID_KEWARGANEGARAAN'] != 1){
                    $internasional = true;
                }
            }

            if(count($cek) == 0){
                $arr_insert = [
                    'idusers' => $data_hasil['data']['id'],
                    'nimnip' => $data_hasil['data']['username'],
                    'nama' => $data_hasil['data']['name'],
                    'join_table' => $data_hasil['data']['join_table'],
                    'email' => $data_hasil['data']['email'],
                    'id_unit_kerja' => $data_hasil['data']['homebase_induk']['ID_UNIT_KERJA'],
                    'nama_unit_kerja' => $data_hasil['data']['homebase_induk']['NM_UNIT_KERJA'],
                    'fakultas' => $fakultas,
                    'gender' => $data_hasil['data']['gender'],
                    'internasional' => $internasional,
                    'created_at' => $ts,
                    'admin' => false,
                    'sustain_ques' => false,
                    'esg_ques' => false,
                    'birth_date' => $data_hasil['data']['birth_date'] ?? null,
                ];

                try {
                    DB::table('users')->insert($arr_insert);
                } catch (\Exception $e) {
                    return back()->with('status', [
                        'status' => 'danger',
                        'message' => 'Terjadi kesalahan saat menyimpan data pengguna.'
                    ]);
                }

                $datauser = array(
                    'idusers' => $data_hasil['data']['id'],
                    'nimnip' => $data_hasil['data']['username'],
                    'nama' => $data_hasil['data']['name'],
                    'join_table' => $data_hasil['data']['join_table'],
                    'email' => $data_hasil['data']['email'],
                    'id_unit_kerja' => $data_hasil['data']['homebase_induk']['ID_UNIT_KERJA'],
                    'nama_unit_kerja' => $data_hasil['data']['homebase_induk']['NM_UNIT_KERJA'],
                    'fakultas' => $fakultas,
                    'gender' => $data_hasil['data']['gender'],
                    'internasional' => $internasional,
                    'birth_date' => $data_hasil['data']['birth_date'] ?? null,
                );

            }
            else{

                // dd($cek);

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
            }

            Session::put('userdata', $datauser);

            // $genericUser = new \Illuminate\Auth\GenericUser([
            //     'id' => $datauser['idusers'],
            //     'nimnip' => $datauser['nimnip']
            // ]);

            // Auth::login($genericUser);

            // dd(session('userdata'));

            return redirect()->route('home');
            
        }
        else{
            return back()->with('status', [
                'status' => 'danger',
                'message' => 'NIP/NIM atau Password salah'
            ]);
        }
    }

    public function logout() {
        // Custom logout logic can be added here if needed
    }
}
