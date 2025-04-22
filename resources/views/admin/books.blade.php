<x-layout>
    <x-slot:title>Kelola Buku</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Buku</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <div class="flex justify-between">
                <h1 class="text-sm font-semibold">Daftar Buku</h1>
                <form class="ml-auto mr-8">
                    <input type="text" name="search" class="rounded-md px-3 py-2 border border-gray-400 outline-blue-500" placeholder="Cari Buku">
                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-gray-500">Cari</button>
                </form>
                <a href="/admin/tambah" class="text-sm font-semibold text-blue-600 hover:text-blue-800 my-auto">Tambah Buku</a>
            </div>
            <table class="border mr-4 w-full mt-4">
                <tr class="border text-left bg-blue-900 text-white">
                    <th class="p-2">No</th>
                    <th class="p-2">Judul</th>
                    <th class="p-2">Penulis</th>
                    <th class="p-2">Penerbit</th>
                    <th class="p-2">Tahun Terbit</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Action</th>
                </tr>
                <?php $no = 1 ?>
                @foreach ($data as $item) 
                    <tr class="border">
                        <td class="p-2">{{$no++}}</td>
                        <td class="p-2">{{$item->judul_buku}}</td>
                        <td class="p-2">{{$item->penulis}}</td>
                        <td class="p-2">{{$item->penerbit}}</td>
                        <td class="p-2">{{$item->tahun_terbit}}</td>
                        <td class="p-2">
                            <p class="rounded-lg p-2 {{$item->status == 'tersedia' ? 'bg-green-600' : 'bg-red-600'}} w-fit text-white">
                                {{$item->status}}
                            </p>
                        </td>
                        <td class="p-2">
                            <div class="flex gap-1">
                                <a href="/admin/edit/{{$item->id}}" class="flex items-center justify-center bg-yellow-300 hover:bg-yellow-500 rounded-lg cursor-pointer p-1 w-fit">
                                    <img src="../assets/icons/edit.svg" alt="logo" class="w-6">
                                </a>
                                <form action="{{ route('book.delete', ['id' => $item->id]) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="delete-btn flex items-center justify-center bg-red-600 hover:bg-red-800 rounded-lg cursor-pointer p-1 w-fit">
                                        <img src="../assets/icons/trash.svg" alt="logo" class="w-6">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</x-layout>