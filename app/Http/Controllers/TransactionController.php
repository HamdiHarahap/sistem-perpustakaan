<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'title' => 'required',
            'pinjam' => 'required',
        ]);

        $user = User::where('name', $request->input('nama'))->first();
        $book = Book::where('judul_buku', $request->input('title'))->first();

        if (!$user || !$book) {
            return back()->withErrors(['error' => 'User atau Buku tidak ditemukan.']);
        }

        Transaction::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'tanggal_pinjam' => $request->input('pinjam'),
            'tanggal_kembali' => Carbon::parse($request->input('pinjam'))->addDays(7),
        ]);

        $user->update(['status' => 'meminjam']);

        $book->update(['status' => 'dipinjam']);

        return redirect()->route('user.history');
    }

    public function updateStatus($id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->status === 'meminjam') {
            $transaction->update(['status' => 'kembali']);

            $book = Book::find($transaction->book_id);
            if ($book) {
                $book->update(['status' => 'tersedia']);
            }

            $hasOtherLoans = Transaction::where('user_id', $transaction->user_id)
                ->where('status', 'meminjam')
                ->exists();

            if (!$hasOtherLoans) {
                $user = User::find($transaction->user_id);
                if ($user) {
                    $user->update(['status' => 'tidak meminjam']);
                }
            }
        } elseif ($transaction->status === 'denda') {
            $transaction->update(['status' => 'kembali']);

            $book = Book::find($transaction->book_id);
            if ($book) {
                $book->update(['status' => 'tersedia']);
            }

            $hasOtherLoans = Transaction::where('user_id', $transaction->user_id)
                ->where('status', 'meminjam')
                ->exists();

            if (!$hasOtherLoans) {
                $user = User::find($transaction->user_id);
                if ($user) {
                    $user->update(['status' => 'tidak meminjam']);
                }
            }
        }


    }


}
