<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\History;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    public function index()
    {

        $id_user = auth()->id();
        $events  = Event::all();
        // $saldo = DB::table('saldos')->join('users', 'users.id', '=', 'saldos.id_user')->orderBy(DB::raw('(c_saldo)'), 'DESC')->get();
        $saldo = DB::table('saldos')->join('users', 'users.id', '=', 'saldos.id_user')->where('id_user', Auth::user()->id)->get();
        // $saldo = Saldo::join('users', 'users.id', '=', 'saldos.id_user')->where('id_user', Auth::user()->id)->get();
        return view('user.kuis', compact('events', 'saldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $events = Event::all();
        return view('user.kuis', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
