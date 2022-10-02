<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Alert;
use Carbon\Carbon;

class GaleriController extends Controller
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

            $galeri = Galeri::where('judul', 'LIKE', '%' . $keyword . '%')
                ->orwhere('keterangan', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        } else {
            $galeri = Galeri::paginate(5);
        }

        return view('galeri.galeri', compact('galeri', 'keyword'));
    }

    public function create()
    {
        $galeri = new Galeri();
        return view('galeri.create', compact('galeri'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->file('gambar')) {
            $image_name = $request->file('gambar')->store('gambargaleri', 'public');
        }
        Galeri::create([
            'gambar' => $image_name,
            'judul' => $request->judul,
            'Keterangan' => $request->Keterangan,

        ]);
        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect('/galeri');
    }


    public function edit($id)
    {
        $galeri = Galeri::find($id);
        return view('galeri.edit', compact('galeri'));
    }


    public function update($id, Request $request)
    {
        $galeri = Galeri::find($id);
        $galeri->judul = $request->judul;
        $galeri->Keterangan = $request->Keterangan;


        if (
            $galeri->gambar && file_exists(storage_path('storage/app/public/gambargaleri' . $galeri->gambar))
        ) {
            Storage::delete('public/' . $galeri->gambar);
        }
        $image_name = $request->file('gambar')->store('gambargaleri', 'public');
        $galeri->gambar = $image_name;
        $galeri->save();
        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('/galeri');
    }

    public function destroy($id)
    {
        $galeri = Galeri::where('id', $id)->first();
        $galeri->delete();

        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect('galeri');
    }
}
