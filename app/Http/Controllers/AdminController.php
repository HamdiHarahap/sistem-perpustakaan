<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $hitungUser = User::where('role', 'user')->count();
        $hitungBuku = Book::count();
        $hitungPinjam = Transaction::count();

        return view('admin.dashboard', [
            'hitungUser' => $hitungUser,
            'hitungBuku' => $hitungBuku,
            'hitungPinjam' => $hitungPinjam,
            'page' => 'dashboard'
        ]); 
    }

    public function userPage()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', [
            'data' => $users,   
            'page' => 'users'
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
    
        return view('admin.books', [
            'data' => $books->get(),
            'page' => 'books'
        ]);
    }
    

    public function transPage()
    {
        $today = Carbon::today();

        Transaction::where('status', 'meminjam')
            ->where('tanggal_wajib_kembali', '<', $today)
            ->update(['status' => 'denda']);

        $transaksi = Transaction::with(['user', 'book'])->orderBy('tanggal_pinjam', 'asc');

        if (request('search')) {
            $search = request('search');
            $transaksi->where(function($query) use ($search) {
                $query->whereHas('user', function($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('book', function($q) use ($search) {
                        $q->where('judul_buku', 'like', "%$search%");
                    })
                    ->orWhere('tanggal_pinjam', 'like', "%$search%")
                    ->orWhere('tanggal_wajib_kembali', 'like', "%$search%")
                    ->orWhere('tanggal_kembali', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%");
            });
        }

        return view('admin.transaksi', [
            'data' => $transaksi->get(),
            'page' => 'transaksi'
        ]);
    }


    public function addBookPage()
    {
        return view('admin.tambah', [
            'page' => 'books'
        ]);
    }

    public function editBookPage(string $id)
    {
        $book = Book::where('id', $id)->first();

        return view('admin.edit', [
            'data' => $book,
            'page' => 'books'
        ]);
    }

    public function reportPage()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data = Transaction::orderBy('tanggal_pinjam', 'asc')->get();

        $html = view('admin.report', ['data' => $data])->render();

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="Laporan_Transaksi_Perpustakaan.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');

        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan_Transaksi_Perpustakaan.pdf', 'I');

    }

}
