<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $leaderboard = DB::table('histories')->select('histories.*', 'name', DB::raw('SUM(grade) as total'))
        //     ->join('users', 'users.id', '=', 'histories.id_user')
        //     ->groupBy('histories.id_user')
        //     ->orderBy(DB::raw('SUM(grade)'), 'DESC')->paginate(10);
        // $data['leaderboard']    = $leaderboard;
        $saldo = Saldo::join('users', 'users.id', '=', 'saldos.id_user')->where('id_user', Auth::user()->id)->get();

        return view('user.userkuis', $saldo);
    }
}
