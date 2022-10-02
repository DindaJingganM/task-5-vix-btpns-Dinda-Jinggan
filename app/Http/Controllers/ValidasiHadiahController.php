<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\HadiahHistory;

class ValidasiHadiahController extends Controller
{
    public function index()
    {
        $hadiah_histori = DB::table('hadiah_histories')->join('users', 'users.id', '=', 'hadiah_histories.id_user')->get();

        return view('hadiah/validasi_hadiah',['hadiah_histori'=>$hadiah_histori]);

    }

    public function validasih(Request $request){
        $hadiah_histori = HadiahHistory::where("qr_code",$request->qr_code)->first();
          if($hadiah_histori == null){
            return response()->json(['status'=>400, ]);
        }
        return response()->json(['status'=>200, ]);
        

        // $qr = $request->qr_code;
        // // $data = 'hadiah_histories';
        // $hadiah_histori = HadiahHistory::where('qr_code',$request->qr_code)->first();

        // if($qr == $hadiah_histori){
        //     return response()->json(['status'=>200, ]);
        // }else{
        //     return response()->json(['status'=>400, ]);
        // }
        // dd($request->all());
    }
}
