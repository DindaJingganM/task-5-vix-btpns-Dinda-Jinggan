<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->has('keyword')) {

            $informasi = Informasi::where('judul', 'LIKE', '%' . $keyword . '%')
                ->orwhere('keterangan', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        } else {
            $informasi = Informasi::paginate(5);
        }
        return view('informasi.informasi', compact('informasi','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informasi = new Informasi;
        return view('informasi.create', compact('informasi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->file('gambar')) {
            $image_name = $request->file('gambar')->store('gambarinformasi', 'public');
        }
        Informasi::create([
            'gambar' => $image_name,
            'judul' => $request->judul,
            'Keterangan' => $request->Keterangan,

        ]);

        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect('informasi');
    }


    public function edit($id)
    {
        $informasi = Informasi::find($id);
        return view('informasi.edit', compact('informasi'));
    }


    public function update($id, Request $request)
    {
        $informasi = Informasi::find($id);

        $informasi->judul = $request->judul;
        $informasi->Keterangan = $request->Keterangan;

        if (
            $informasi->gambar && file_exists(storage_path('storage/app/public/gambarinformasi' . $informasi->gambar))
        ) {
            Storage::delete('public/' . $informasi->gambar);
        }
        $image_name = $request->file('gambar')->store('gambarinformasi', 'public');
        $informasi->gambar = $image_name;
        $informasi->save();

        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('/informasi');
    }

    public function destroy($id)
    {
        $informasi = Informasi::where('id', $id)->first();
        $informasi->delete();

        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect('informasi');
    }
}
