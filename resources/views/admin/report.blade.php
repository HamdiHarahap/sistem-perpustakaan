<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        table { width: 100%; border-collapse: collapse; border: 1px solid black; font-size: 0.875rem; font-size: 12px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #1E3A8A; color: white; }
    </style>
</head>
<body>
    <h1 style="text-align: center">Sistem Perpustakaan</h1>
    <h3 style="text-align: center;">Laporan Transaksi</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Harus Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
        <?php $no = 1 ?>
        @foreach ($data as $item) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->book->judul_buku }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_wajib_kembali }}</td>
                <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
