<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hadiah;

class KelolaHadiah extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->has('keyword')) {

            $hadiahs = Hadiah::where('name', 'LIKE', '%' . $keyword . '%')
                ->orwhere('description', 'LIKE', '%' . $keyword . '%')
                ->orwhere('price', 'LIKE', '%' . $keyword . '%')
                ->orwhere('stok', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        } else {
            $hadiahs = Hadiah::paginate(5);
        }
        return view('hadiah.hadiah-index', compact('hadiahs', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hadiah.hadiah-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $result = collect(request()->except('_token'));
        $result->put('status', 'on')->put('hid', rand());
        Hadiah::create($result->toArray());
        
        

        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect()->to('hadiah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hadiahs = Hadiah::where('hid', $id);
        if($hadiahs->count() == 0)
            return abort(404, 'Data tidak dapat ditemukan!');
        
        $hadiah = $hadiahs->first();
        return view('hadiah.hadiah-edit', compact('hadiah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = collect(request()->except('_token', '_method'));
       
        $hadiah = Hadiah::find($id);

            $hadiah->name = $request->name;
            $hadiah->description = $request->description;
            $hadiah->price = $request->price;
            $hadiah->stok = $request->stok;
            // $voucher->create($result->toArray());
        $hadiah->save();
        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('/hadiah');
        // return redirect()->to('voucher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hadiah = Hadiah::find($id);
        if(!$hadiah)
            return abort(403, 'Gagal Menghapus! Data tidak dapat ditemukan atau ada kesalahan dari server!');

        $hadiah->delete();
        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect()->to('hadiah');
    }
}
