<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuKunjungan;
use PDF;

class BukuKunjunganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->has('keyword')) {

            $bukukunjungan = BukuKunjungan::where('nama', 'LIKE', '%' . $keyword . '%')
                ->orwhere('alamat', 'LIKE', '%' . $keyword . '%')
                ->orwhere('jumlahpengunjung', 'LIKE', '%' . $keyword . '%')
                ->orwhere('nomorhp', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        } else {
            $bukukunjungan = BukuKunjungan::paginate(5);
        }
        return view('bukukunjungan.bukukunjungan', compact('bukukunjungan', 'keyword'));
    }

    // public function tambah()
    // {
    // return view('bukukunjungan.tambahbukukunjungan');
    // }
    public function create()
    {
        $bukukunjungan = new BukuKunjungan();
        return view('bukukunjungan.create', compact('bukukunjungan'));
    }

    public function store(Request $request)
    {
        $bukukunjungan = new BukuKunjungan();
        BukuKunjungan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jumlahpengunjung' => $request->jumlahpengunjung,
            'nomorhp' => $request->nomorhp,

        ]);
        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect('/bukukunjungan');
    }

    public function edit($id)
    {
        $bukukunjungan = BukuKunjungan::find($id);
        return view('bukukunjungan.edit', ['bukukunjungan' => $bukukunjungan]);
    }

    public function update($id, Request $request)
    {
        $bukukunjungan = BukuKunjungan::find($id);
        $bukukunjungan->nama = $request->nama;
        $bukukunjungan->alamat = $request->alamat;
        $bukukunjungan->jumlahpengunjung = $request->jumlahpengunjung;
        $bukukunjungan->nomorhp = $request->nomorhp;

        $bukukunjungan->save();
        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('bukukunjungan');
    }


    public function destroy($id)
    {
        $bukukunjungan = BukuKunjungan::where('id', $id)->first();
        $bukukunjungan->delete();

        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect('bukukunjungan');
    }

    public function exportpdf()
    {
        $bukukunjungan = BukuKunjungan::all();
        view()->share('bukukunjungan', $bukukunjungan);
        $pdf = PDF::loadview('bukukunjungan.bukukunjungan-pdf');
        return $pdf->download('databukukunjungan.pdf');
    }
}
