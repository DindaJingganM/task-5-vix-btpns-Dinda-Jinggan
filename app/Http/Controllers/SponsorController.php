<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->has('keyword')) {

            $sponsor = sponsor::where('namasponsor', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        } else {
            $sponsor = sponsor::paginate(5);
        }

        return view('sponsor.sponsor', compact('sponsor', 'keyword'));
    }

    public function create()
    {

        $sponsor = new sponsor;
        return view('sponsor.create', compact('sponsor'));
    }

    public function store(Request $request)
    {

        sponsor::create([
            'namasponsor' => $request->namasponsor,

        ]);
        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect('/sponsor');
    }

    public function edit($id)
    {
        $sponsor = sponsor::find($id);
        return view('sponsor.edit', compact('sponsor'));
    }

    public function update($id, Request $request)
    {
        $sponsor = sponsor::find($id);
        $sponsor->namasponsor = $request->namasponsor;

        $sponsor->save();
        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('/sponsor');
    }

    public function destroy($id)

    {
        $sponsor = sponsor::where('id_sponsor', $id)->first();
        $sponsor->delete();

        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect('sponsor');
    }
}
