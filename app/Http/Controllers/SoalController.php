<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Event;
use PDF;

class SoalController extends Controller
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

            $soal = Soal::where('id_event', 'LIKE', '%' . $keyword . '%')
                ->orwhere('soal', 'LIKE', '%' . $keyword . '%')
                ->orwhere('a', 'LIKE', '%' . $keyword . '%')
                ->orwhere('b', 'LIKE', '%' . $keyword . '%')
                ->orwhere('c', 'LIKE', '%' . $keyword . '%')
                ->orwhere('d', 'LIKE', '%' . $keyword . '%')
                ->orwhere('kunci', 'LIKE', '%' . $keyword . '%')
                ->paginate(5);
        }

        else{
            $soal = Soal::with('events')->paginate(5);
        }

        return view('soal.soal', compact('soal','keyword' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        $soals = Soal::all();
        return view('soal.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Soal::create([
            'id_event' => $request->id_event,
            'soal' => $request->soal,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'kunci' => $request->kunci,

        ]);
        toastr()->success('Data Berhasil Ditambahkan', 'Successfully!');
        return redirect('/soal');
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
        $events = Event::latest()->get();
        $soal = Soal::find($id);
        return view('soal.edit', compact('soal','events'));
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
        $events = Event::find($id);
        $soal = Soal::find($id);
        $soal->id_event = $request->id_event;
        $soal->soal = $request->soal;
        $soal->a = $request->a;
        $soal->b = $request->b;
        $soal->c = $request->c;
        $soal->d = $request->d;
        $soal->kunci = $request->kunci;
        $soal->save();
        toastr()->success('Data Berhasil Diupdate', 'Successfully!');
        return redirect('/soal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal = Soal::where('id_soal', $id)->first();
        $soal->delete();

        toastr()->error('Data Berhasil Dihapus', 'Deleted!');
        return redirect('soal');
    }

    public function exportpdf(){
        $soal = Soal::all();
        view()->share('soal', $soal);
        $pdf = PDF::loadview('soal.soal-pdf');
        return $pdf->download('datasoal.pdf');
    }

}
