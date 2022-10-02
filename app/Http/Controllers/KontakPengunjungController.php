<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Komentar;

class KontakPengunjungController extends Controller
{
    public function index()
    {
        $komentar = DB::table('komentars')->get();
        return view('pengunjung.kontak' , ['komentar'=>$komentar]); 
        
    }

    
    public function create()
    {

        $komentar = new Komentar;
        return view('pengunjung.kontak', compact('pengunjung'));
    }

    public function store(Request $request)
    {

        Komentar::create([
            'nama' => $request->nama,
            'komen' => $request->komen,
            'tanggapan' => $request->tanggapan,

        ]);
        return redirect('kontak');
    }

}
