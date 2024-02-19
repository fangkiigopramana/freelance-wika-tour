<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        return view('pesanan.index')->with('pesanans', $pesanans);
    }

    public function tolak($id,Request $request)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        
        DB::update('UPDATE pesanan SET status = :status
        WHERE id_pesanan = :id', 
        [
            'id' => $id,
            'status' => 'gagal',
        ]);
        return redirect()->route('pesanan.index')->with('success', 'Pemesanan Tiket Telah ditolak !');
    }

    public function edit($id)
    {
        $pesanan = DB::table('pesanan')->where('id_pesanan', $id)->first();
        return view('pesanan.edit')->with('pesanan', $pesanan);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'kode_tiket'=> 'required',
        ]);
        DB::update(
            'UPDATE pesanan SET status = :status, kode_tiket = :kode_tiket, updated_at = :updated_at WHERE id_pesanan = :id',
            [
                'id'=> $id, 
                'kode_tiket'=> $request->kode_tiket,
                'status' => 'selesai',
                'updated_at' => NOW(), 
            ]
        );
        return redirect()->route('pesanan.index')->with('success', 'Data tiket berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pesanan WHERE id_user =:id_pesanan', ['id_pesanan' => $id]);
        return redirect()->route('pesanan.index')->with('success', 'Data peminjam berhasil dihapus');
    }
    
}

