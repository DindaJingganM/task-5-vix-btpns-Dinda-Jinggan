<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Sponsor;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->has('keyword')) {

            $event = Event::where('namaevent', 'LIKE', '%' . $keyword . '%')
                ->orwhere('tanggal_mulai', 'LIKE', '%' . $keyword . '%')
                ->orwhere('tanggal_akhir', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        } else {
            $event = Event::paginate(5);
        }

        return view('event.event', compact('event', 'keyword'));
    }

    public function create()
    {
        $sponsors = Sponsor::all();
        $event = Event::all();
        return view('event.create', compact('sponsors'));
    }

    public function store(Request $request)
    {

        Event::create([
            'id_sponsor' => $request->id_sponsor,
            'namaevent' => $request->namaevent,
            'poin' => $request->poin,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,

        ]);
        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect('/event');
    }

    public function edit($id)
    {
        $sponsors = Sponsor::latest()->get();
        $event = Event::find($id);
        return view('event.edit', compact('event','sponsors'));
    }

    public function update($id, Request $request)
    {
        $sponsors = Sponsor::find($id);
        $event = Event::find($id);
        $event->id_sponsor = $request->id_sponsor;
        $event->namaevent = $request->namaevent;
        $event->poin = $request->poin;
        $event->tanggal_mulai = $request->tanggal_mulai;
        $event->tanggal_akhir = $request->tanggal_akhir;


        $event->save();
        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('/event');
    }

    public function destroy($id)

    {
        $event = Event::where('id_event', $id)->first();
        $event->delete();

        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect('event');
    }
}
