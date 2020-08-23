<?php

namespace App\Http\Controllers\HR;

use DB;

use App\pyr_set_perizinan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanPerizinanController extends Controller
{
    public function index(){
        $data['title'] = 'Pengaturan Perizinan';
        $data['pengaturan'] = 'active';
        $data['perizinan'] = 'active';
        return view('pengaturan/perizinan/perizinan', $data);
    }

    public function create(Request $request){
        if(empty($request->toleransi)){
            $request->{'toleransi'} = 0;
        }
        DB::beginTransaction();
        try{
            pyr_set_perizinan::create([
                'jenis_perizinan' => $request->jenis_perizinan,
                'deskripsi' => $request->deskripsi,
                'toleransi' => $request->toleransi
            ]);

            DB::commit();
            return 'success';
        } catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function createDatatable(){
        return json_encode([
            'data' => pyr_set_perizinan::where('deleted', 0)->get()
        ]);
    }
}
