<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SustainabilityController extends Controller
{
    public function index($ques, $sesi)
    {
        $userdata = session('userdata');

        $ques = decrypt($ques);
        $sesi = decrypt($sesi);

        if($sesi == -1){

            try {
                if($ques == 1){
                    DB::table('users')
                        ->where('idusers', $userdata['idusers'])
                        ->update([
                            'sustain_ques' => true
                        ]);
                }
                else{
                    DB::table('users')
                        ->where('idusers', $userdata['idusers'])
                        ->update([
                            'esg_ques' => true
                        ]);
                }
            } catch (Exception $e) {
                // Handle the exception
                return back()->with('status', [
                    'status' => 'danger',
                    'message' => 'Terjadi kesalahan saat mengupdate status questioner.'
                ]);
            }
            
            if($ques == 1)
                return redirect()->route('selesai_questioner');
            else
                return redirect()->route('selesai_questioner_esg');
        }

        if(session('userdata')['join_table'] == 2){
            $tipeuser = 'dosen';
        }
        else if(session('userdata')['join_table'] == 3){
            $tipeuser = 'mahasiswa';
        }
        else{
            $tipeuser = 'tendik';
        }

        $jawaban_q = DB::table('jawaban')
                    ->where('jenis_ques', $ques)
                    ->where('sesi', $sesi)
                    ->where('idusers', $userdata['idusers'])
                    ->get();

        $jawaban = array();
        foreach($jawaban_q as $jq){
            $jawaban[$jq->nomor_ques] = $jq->jawab;
        }

        if($ques == 1){
            $ques_str = 'sustainable';
        }
        else{
            $ques_str = 'esg';
        }

        // dd($userdata);

        return view($ques_str.'.'.$tipeuser.'.sesi_'.$sesi, compact('jawaban', 'userdata', 'ques', 'sesi'));
        
    }

    public function submit_form(Request $request)
    {
        // dd($request->all());

        

        date_default_timezone_set('Asia/Jakarta');
        $ts = date('Y-m-d H:i:s'); // Menampilkan waktu Jakarta

        if($request->post('nomor') !== null && count($request->post('nomor')) > 0){
            $arr_insert = array();

            foreach($request->post('nomor') as $key => $value){
                $arr_insert[] = array(
                    'jenis_ques' => $request->post('tipe_ques'),
                    'sesi' => $request->post('sesi'),
                    'idusers' => session('userdata')['idusers'],
                    'nomor_ques' => $key,
                    'jawab' => $value,
                    'created_at' => $ts,            
                );
            }


            try {
                DB::table('jawaban')->upsert($arr_insert, ['jenis_ques', 'sesi', 'idusers', 'nomor_ques'], ['jawab', 'created_at']);
            } catch (Exception $e) {
                // Handle the exception
                return back()->with('status', [
                    'status' => 'danger',
                    'message' => 'Terjadi kesalahan saat menyimpan jawaban.'
                ]);
            }

            // if(session('userdata')['join_table'] == 2){
            //     $tipeuser = 'dosen';
            // }
            // else if(session('userdata')['join_table'] == 3){
            //     $tipeuser = 'mahasiswa';
            // }
            // else{
            //     $tipeuser = 'tendik';
            // }

            // $ques = $request->post('tipe_ques');
            // $sesi = $request->post('nextsesi');

            // $userdata = session('userdata');

            // $jawaban = DB::table('jawaban')
            //             ->where('jenis_ques', $ques)
            //             ->where('sesi', $sesi)
            //             ->where('idusers', $userdata['idusers'])
            //             ->get();
            

            // if($request->post('tipe_ques') == 1){
            //     // return redirect()->route('sustainable.dosen.sesi_'.$request->post('nextsesi'))->with('status', [
            //     //     'status' => 'success',
            //     //     'message' => 'Jawaban berhasil disimpan.'
            //     // ]);

            //     session()->flash('status', [
            //         'status' => 'success',
            //         'message' => 'Jawaban berhasil disimpan.'
            //     ]);

            //     return view('sustainable.'.$tipeuser.'.sesi_'.$sesi, compact('jawaban', 'userdata', 'ques', 'sesi'));
            // }

            session()->flash('status', [
                'status' => 'success',
                'message' => 'Jawaban berhasil disimpan.'
            ]);
        }

        

        return redirect()->route('questioner_sustainability', ['ques' => encrypt($request->post('tipe_ques')), 'sesi' => encrypt($request->post('nextsesi'))]);


    }
}
