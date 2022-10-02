<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\VoucherHistory;

class ValidasiVoucherController extends Controller
{
    public function index()
    {
        $voucher_histori = DB::table('voucher_histories')->join('users', 'users.id', '=', 'voucher_histories.id_user')->get();

        return view('voucher/validasi_voucher',['voucher_histori'=>$voucher_histori]);

    }

    public function validasiv(Request $request){
        $voucher_histori = VoucherHistory::where("qr_code",$request->qr_code)->first();
          if($voucher_histori == null){
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
