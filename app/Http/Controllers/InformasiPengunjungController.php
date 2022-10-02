<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiPengunjungController extends Controller
{


    public function index()
    {
    

        $informasi=DB::table('informasis')->get()->sortByDesc('created_at');

        return view('pengunjung.informasipengunjung',['informasi'=>$informasi]);
    }
   

    public function readmore(Informasi $informasi){
        return view('pengunjung.readmore', compact('informasi'));
    }
}
