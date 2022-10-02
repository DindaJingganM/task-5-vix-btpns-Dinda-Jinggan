<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Komentar;
use App\Models\Event;

class HomePengunjungController extends Controller
{

    public function index()
    {
        $galeri = DB::table('galeris')->get();
        $komentar = DB::table('komentars')->get();
        $galeri = Galeri::paginate(3)->sortByDesc('created_at');
        $event = DB::table('events')->get();
        return view('pengunjung.homepengunjung' , ['galeri' => $galeri, 'komentar'=>$komentar], ['event' => $event, 'event'=>$event]); 
        
    }
    public function create()
    {

        $komentar = new Komentar;
        return view('pengunjung.homepengunjung', compact('pengunjung'));
    }

    public function store(Request $request)
    {

        Komentar::create([
            'nama' => $request->nama,
            'komen' => $request->komen,
            'tanggapan' => $request->tanggapan,

        ]);
        return redirect('/');
    }
   
}
