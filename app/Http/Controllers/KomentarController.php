<?php

namespace App\Http\Controllers;
use App\Models\Komentar;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->has('keyword')) {

            $komentar = Komentar::where('nama', 'LIKE', '%' . $keyword . '%')
                ->orwhere('komen', 'LIKE', '%' . $keyword . '%')
                ->orwhere('tanggapan', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        } else {
            $komentar = Komentar::paginate(5);
        }

        return view('komentar.komentar' ,compact('komentar', 'keyword'));

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
        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect('/komentar');
    }

    public function edit($id)
    {
        $komentar = Komentar::find($id);
        return view('komentar.komentaredit',compact('komentar'));
    }
    public function update($id, Request $request)
    {
        $komentar = Komentar::find($id);
        $komentar->nama = $request->nama;
        $komentar->komen = $request->komen;
        $komentar->tanggapan = $request->tanggapan;

        $komentar->save();
        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('/komentar');
    }

    public function destroy($id)
    {
        $komentar = Komentar::where('id_komentar', $id)->first();
        $komentar->delete();

        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect('/komentar');
    }
    
}
