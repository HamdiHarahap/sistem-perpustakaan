<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required'
        ]);

        Book::create([
            'judul_buku' => $request->input('title'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun')
        ]);

        Alert::success('Buku Baru', 'Data buku baru telah ditambahkan!');
        return redirect()->route('admin.books');
    }

    public function update(Request $request, string $id) 
    {
        $request->validate([
            'title' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required'
        ]);
        
        Book::where('id', $id)->update([
            'judul_buku' => $request->input('title'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun')
        ]);

        Alert::success('Update Buku', 'Data buku telah diperbarui!');
        return redirect()->route('admin.books');
    }

    public function destroy(string $id) 
    {
        $book = Book::where('id', $id)->first();

        if($book->status == 'dipinjam') {
            Alert::error('Buku Dipinjam', 'Buku tidak dapat dihapus karena sedang dipinjam');
        } else {
            Alert::success('Hapus Buku', 'Buku telah dihapus!');
            $book->delete();
        }

        return redirect()->route('admin.books');
    }
}
