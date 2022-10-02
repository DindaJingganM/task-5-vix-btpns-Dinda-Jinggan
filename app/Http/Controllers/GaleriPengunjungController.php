<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Galeri;
class GaleriPengunjungController extends Controller
{
    public function index()
    {

        $galeri=DB::table('galeris')->get()->sortByDesc('created_at');
        return view('pengunjung/galeripengunjung',['galeri'=>$galeri]);
    }
}
