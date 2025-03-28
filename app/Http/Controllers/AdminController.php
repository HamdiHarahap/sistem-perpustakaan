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
        $books = Book::orderBy('id', 'asc')->get();

        return view('admin.books', [
            'data' => $books,
            'page' => 'books'
        ]);
    }

    public function transPage()
    {
        $today = Carbon::today();

        Transaction::where('status', 'meminjam')
            ->where('tanggal_kembali', '<', $today)
            ->update(['status' => 'denda']);

        $transaksi = Transaction::orderBy('tanggal_pinjam', 'asc')->get();

        return view('admin.transaksi', [
            'data' => $transaksi,
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

        // Render file khusus PDF
        $html = view('admin.report', ['data' => $data])->render();

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="Laporan_Transaksi_Perpustakaan.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');

        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan_Transaksi_Perpustakaan.pdf', 'I');

    }

}
