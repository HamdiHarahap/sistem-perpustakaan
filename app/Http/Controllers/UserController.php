<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard', [
            'page' => 'dashboard',
        ]);
    }

    public function bookPage()
    {
        $books = Book::orderBy('id', 'asc')->get();

        return view('user.books', [
            'data' => $books,
            'page' => 'books'
        ]);
    }

    public function transPage()
    {
        $user = Auth::user();

        $books = Book::orderBy('id', 'asc')->get();
        
        return view('user.transaksi', [
            'data' => $books,
            'page' => 'transaksi',
            'status' => $user->status
        ]);
    }

    public function historyPage()
    {
        $user = Auth::user();

        $today = Carbon::today();

        Transaction::where('status', 'meminjam')
            ->where('tanggal_kembali', '<', $today)
            ->update(['status' => 'denda']);

        $history = Transaction::where('user_id', $user->id)->get();

        return view('user.history', [
            'page' => 'history',
            'data' => $history,
        ]);
    }
}
