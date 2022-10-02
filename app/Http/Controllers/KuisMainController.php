<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{Event, Soal, Answer, History, Saldo, SaldoHistory};
use Illuminate\Http\Request;


class KuisMainController extends Controller
{
    /**
     * Halaman Beranda Kuis
     * Menampilkan data beranda kuis untuk memulai kegiatan kuis
     * 
     * @param $id_event string|number Data ID dari kegiatan.
     * @return Illuminate\Support\Facades\View
     */
    public function index($id_event = null)
    {
        
        
        if(History::where(['id_user'=> auth()->id(), 'id_event'=>$id_event])->count() > 0)
            return abort(403, 'Anda sudah mengerjakan kuis ini!');

        $event = Event::where('id_event', $id_event);
        if ($event->count() > 0) {
            $data['soal']  = Soal::where('id_event', $id_event)->get();
            $data['event'] = $event->first();
            $data['soal']  = Soal::where('id_event', $id_event)->get();

            return view('user.kuismain', $data);
        } else {
            return redirect()->url('userkuis');
        }
    }

    /**
     * Points to Saldo
     * Menambahkan poin ke dalam saldo akun
     * 
     * @param $point int Poin yang akan ditambahkan ke akun
     * @param $user int ID User target yang akan ditambahkan saldonya 
     * 
     * @return void
     */
    public function countSaldo(int $point, $user)
    {
        $data = Saldo::where('id_user', $user);

        # Kalau belum ada data saldo di tabel Saldo, aksi buat data dijalankan
        if ($data->count() == 0) {
            Saldo::create([
                'id_user' => $user,
                'c_saldo' => 0,
                't_saldo' => 0,
            ]);
        }

        $saldo = $data->first();
        $data->update([
            'c_saldo' => (int) $saldo->c_saldo + $point,
            't_saldo' => (int) $saldo->t_saldo + $point,
        ]);
    }

    /**
     * Save Ke Database
     * Memproses data ke dalam database
     * 
     * @param $id_event string|number Data ID dari kegiatan.
     * @param $request mixed Data request submission dari user
     * 
     * @return Illuminate\Support\Facades\Redirect
     */
    public function submitJawaban(Request $request, $id_event)
    {
        
        // Cek Soal apakah ada?
        $soal = Soal::where('id_event', $id_event);

        // Cek apakah eventnya ada atau tidak?
        if ($soal->count() > 0) {
            // Setup Variables
            $user   = auth()->user();
            $answer = request()->jawaban;
            $nilai  = 0;
            $total  = $soal->count();
            $ans    = collect([]);

            // Aksi Check Jawaban Disini
            foreach ($answer as $index => $data) {
                $lists = request()->soal;
                $soal  = Soal::where('id_soal', $lists[$index])->first();
                if (strtolower($data) == strtolower($soal->kunci)) $nilai++;


                $ans->push([
                    'id_user'   => $user->id,
                    'id_event'  => (int) $id_event,
                    'id_soal'   => $lists[$index],
                    'jawaban'   => $data
                ]);
            }
            $poinevent = Event::where('id_event', $id_event)->first();
            $total = ($nilai / $total) * $poinevent->poin;
            $this->countSaldo($total, $user->id);



            Answer::insert($ans->toArray());

            // Masukkan history nilai ke database
            History::insert([
                'id_event'  => (int) $id_event,
                'id_user'   => $user->id,
                'grade'     => $total
            ]);


            return redirect()->to("completed/{$id_event}")->with('nilai', $total);
        } else {
            return abort(403, 'Event tidak dapat ditemukan');
        }
    }

    /**
     * Halaman Terselesaikan
     * Menampilkan halaman selesai setelah mengerjakan soal
     * 
     * @param $id_event string|number Data ID dari kegiatan.
     * @return Illuminate\Support\Facades\View
     */
    public function kuisSelesai($id_event = null)
    {
        # Kalau sesi nilai sudah nggak ada
        if (!session('nilai'))
            return redirect()->to('userkuis');

        # Kalau ada 
        $cekEvent = Event::where('id_event', $id_event);

        // apabila id event valid
        if ($cekEvent->count() > 0) {
            $id_user = auth()->id();
            $where   = [
                'id_user'   => $id_user,
                'id_event'  => $id_event
            ];

            $dataHistori = History::where($where);
            $hitung      = $dataHistori->get()->count();

            // User telah menyelesaikan event
            if ($hitung > 0) {
                // Ambil data peringkat
                $leaderboard = DB::table('histories')->select('histories.*', 'name', DB::raw('SUM(grade) as total'))
                    ->join('users', 'users.id', '=', 'histories.id_user')
                    ->groupBy('histories.id_user')
                    ->orderBy(DB::raw('SUM(grade)'), 'DESC')->get();

                $data['histori']        = $dataHistori->first();
                $data['event']          = $cekEvent->first();
                $data['leaderboard']    = $leaderboard;

                return view('user.kuisselesai', $data);
            } else {
                return abort(403, 'Anda harus menyelesaikan kuis pada event ini!');
            }
        } else {
            return abort(403, "Maaf, event tidak dapat ditemukan!");
        }
    }
}
