<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Saldo;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }
    public function userkuis()
    {
        // $saldo = DB::table('saldos')->join('users', 'users.id', '=', 'saldos.id_user')->orderBy(DB::raw('(c_saldo)'), 'DESC')->get();
        $saldo = Saldo::join('users', 'users.id', '=', 'saldos.id_user')->where('id_user', Auth::user()->id)->get();
        return view('user.userkuis' , ['saldo' => $saldo]); 
    }
}
