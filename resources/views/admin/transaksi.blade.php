<x-layout>
    <x-slot:title>Kelola Transaksi</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Transaksi</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <div class="flex justify-between">
                <h1 class="text-sm font-semibold">Daftar Transaksi</h1>

                <form>
                    <input type="text" name="search" class="rounded-md px-3 py-2 border border-gray-400 outline-blue-500" placeholder="Cari Transaksi">
                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-gray-500">Cari</button>
                </form>
            </div>
            <table class="border mr-4 w-full mt-4">
                <tr class="border text-left bg-blue-900 text-white">
                    <th class="p-2">No</th>
                    <th class="p-2">Nama Peminjaman</th>
                    <th class="p-2">Judul Buku</th>
                    <th class="p-2">Tanggal Pinjam</th>
                    <th class="p-2">Tenggat Kembali</th>
                    <th class="p-2">Tanggal Kembali</th>
                    <th class="p-2">Status</th>
                </tr>
                <?php $no = 1 ?>
                @foreach ($data as $item) 
                    <tr class="border">
                        <td class="p-2">{{$no++}}</td>
                        <td class="p-2">{{$item->user->name}}</td>
                        <td class="p-2">{{$item->book->judul_buku}}</td>
                        <td class="p-2">{{$item->tanggal_pinjam}}</td>
                        <td class="p-2">{{$item->tanggal_wajib_kembali}}</td>
                        <td class="p-2">
                            @if ($item->tanggal_kembali == null)
                                <p>-</p>
                            @else
                                <p>{{$item->tanggal_kembali}}</p>
                            @endif
                        </td>
                        <td class="p-2">
                            <form action="{{route('admin.updateStatus', ['id' => $item->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="{{$item->status}}">
                                <button type="button" class="btn-status rounded-lg p-2 w-fit cursor-pointer status-toggle
                                {{ $item->status === 'meminjam' ? 'bg-orange-500 text-white hover:bg-orange-700' : 
                                   ($item->status === 'kembali' ? 'bg-green-500 text-white hover:bg-green-700' : 
                                   ($item->status === 'denda' ? 'bg-red-500 text-white hover:bg-red-700' : '') ) }}">
                                   {{$item->status}}
                                </button>
                            </form>
                        </td>                                                          
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</x-layout>