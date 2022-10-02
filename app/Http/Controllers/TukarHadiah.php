<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{HadiahHistory, Hadiah, Saldo, SaldoExchange};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TukarHadiah extends Controller
{
    /**
     * Index Page
     * Halaman beranda tukar voucher
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index()
    {
        
        $saldo = Saldo::where('id_user', auth()->id());
        if($saldo->count() == 0)
            abort(403, 'Anda belum memiliki poin yang langsung ditukarkan menjadi saldo!');
        $data['hadiah'] = Hadiah::where([['price', '<=', $saldo->first()->c_saldo], ['status', 'on']])->get();# Data Semua Voucher
        $data['hhist']   = HadiahHistory::where('id_user', auth()->id())->get();  
        // $data= DB::table('hadiah_histories')->get();
        // $hadiah= DB::table('hadiahs')->get();
        // $data['saldo']   = $saldo->first();    
        // $data['qr_code'] =HadiahHistory::select('qr_code')                                     
        $saldo = DB::table('saldos')->join('users', 'users.id', '=', 'saldos.id_user')->where('id_user', auth()->id())->get();
        return view('hadiah.hadiah-user', $data, compact ('saldo'));
    }

    /**
     * Cetak Voucher
     * Cetak voucher dari pengguna
     * 
     * @param $id string|int ID Voucher yang akan dicetak
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function print($id)
    {
        $hadiah = HadiahHistory::where('hdata', $id);

        # Cek apakah ada data?
        if($hadiah->count() == 0)
            return abort(403, 'Data Hadiah tidak dapat ditemukan');

        # Kalau ada lanjut cetaknya
        $hdata = $hadiah->first();
        return view('hadiah.cetak-hadiah', compact('hdata'));
    }

    /**
     * Reedem
     * Reedem Voucher untuk halaman user
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function reedem(Request $request)
    {
          
        $hadiah = Hadiah::where('hid', $request->hid)->first();
        $had = Hadiah::where('id', $hadiah->id)->first();
        $jumlah  = $request->jumlah;

        if($had->stok > 0 && $had->stok > $jumlah ) 
        {
            
            $suser   = Saldo::where('id_user', auth()->id());
            $hadiah = $hadiah->first();                
            $harga   = (int) $jumlah * (int) $hadiah->price;   
            $saldo   = $suser->first();
            

            
            # Cek kalkulasi saldo apakah cukup untuk membayar voucher?
            # Apabila cukup, kurangi saldo dan masukkan vouchernya
            if($saldo->c_saldo >= $harga) {
                # Update Data Riwayat Transaksi Saldo
                SaldoExchange::create([
                    'tid'       => 'TRX-' . rand(),
                    'id_user'   => auth()->id(),
                    'saldo'     => $harga,
                    'jenis'     => 'keluar'
                ]);
                
                # Update Saldo User
                $suser->update(['c_saldo' => (int) $saldo->c_saldo - (int) $harga]);
                $had->update(['stok' => (int) $had->stok - (int) $jumlah]);
                # Tambahkan ke riwayat voucher
                for($i=1;$i<=$jumlah;$i++) {
                    $qr_code = Str::random(20);
                    HadiahHistory::create([
                        'qr_code' => $qr_code,
                        'hid'     => $hadiah->hid,
                        'id_user' => auth()->id(),
                        'hdata'   => 'VCHR-' . rand(),
                    ]);
                }

                # Selesai dan kembali ke halaman awal
                toastr()->success('HadiahBerhasil Ditukarkan', 'Successfully!');
                return redirect('tukar-hadiah');
            }

            else {
                # Apabila tidak, keluarkan pesan transaksi gagal!
                toastr()->error('Transaksi Gagal', 'Saldo Tidak Mencukupi!');
                return redirect('tukar-hadiah');
            }
        } elseif($had->stok < 1){
            toastr()->error('Hadiah Sudah Habis ', 'Failed!');
            return redirect('tukar-hadiah');
        }
        elseif($had->stok < $jumlah){
            toastr()->error('Stock Tidak cukup ', 'Failed!');
            return redirect('tukar-hadiah');
        }
         else {
            toastr()->error('Transaksi Penukaran Gagal', 'Failed!');
            return redirect('tukar-hadiah');
        }
    }
}
