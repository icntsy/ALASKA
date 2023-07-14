<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Metode ini digunakan untuk membuat transaksi baru
    public function create(Request $request, $id) {
        // Melakukan validasi input dari pengguna
        $this->validate($request, [
            'payment' => 'required'
        ]);
        // Membuat transaksi baru dengan menggunakan data yang diberikan oleh pengguna
        $transaction= Transaction::create($request->all());
        // Mengembalikan respons dalam format JSON berisi data transaksi yang baru dibuat
        return response()->json($transaction);
    }

    // Metode ini digunakan untuk merender tampilan yang menampilkan daftar transaksi
    public function render()
    {
        // Membuat query untuk mengambil data transaksi
        $transaction = Transaction::query();
        $transaction = $transaction->paginate(10);
        // Mengarahkan pengguna ke tampilan dengan daftar transaksi yang telah dipaginasi
        return view('livewire.nota-obat.index', compact("transaction"));
    }
}
