<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $hitungPinjam = Transaction::where('user_id', $user->id)->count();
        $dataTerakhir = Transaction::where('user_id', $user->id)
            ->orderBy('id', 'asc')
            ->first();

            return view('user.dashboard', [
                'page' => 'dashboard',
                'hitungPinjam' => $hitungPinjam,
                'terakhirPinjam' => $dataTerakhir ? $dataTerakhir->tanggal_pinjam : '-',
                'bukuTerakhir' => $dataTerakhir && $dataTerakhir->book ? $dataTerakhir->book->judul_buku : '-'
            ]);            
    }

    public function bookPage()
    {
        $books = Book::orderBy('id', 'asc');
    
        if (request('search')) {
            $search = request('search');
            $books->where(function($query) use ($search) {
                $query->where('judul_buku', 'like', "%$search%")
                      ->orWhere('penulis', 'like', "%$search%")
                      ->orWhere('penerbit', 'like', "%$search%")
                      ->orWhere('tahun_terbit', 'like', "%$search%")
                      ->orWhere('status', 'like', "%$search%");
            });
        }
    
        return view('user.books', [
            'data' => $books->get(),
            'page' => 'books'
        ]);
    }

    public function transPage()
    {
        $user = Auth::user();

        $books = Book::where('status', 'tersedia')->orderBy('id', 'asc')->get();
        
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
            ->where('tanggal_wajib_kembali', '<', $today)
            ->update(['status' => 'denda']);

            $history = Transaction::with('book')->where('user_id', $user->id);
        
        if (request('search')) {
            $search = request('search');
            $history->where(function($query) use ($search) {
                $query->whereHas('book', function($q) use ($search) {
                        $q->where('judul_buku', 'like', "%$search%");
                    })
                    ->orWhere('tanggal_pinjam', 'like', "%$search%")
                    ->orWhere('tanggal_wajib_kembali', 'like', "%$search%")
                    ->orWhere('tanggal_kembali', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%");
            });
        }

        return view('user.history', [
            'page' => 'history',
            'data' => $history->get(),
        ]);
    }

    public function changePasswordPage()
    {
        return view('user.change', [
            'user' => Auth::user(),
            'page' => 'change'
        ]);
    }
}
