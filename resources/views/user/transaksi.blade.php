<x-layout>
    <x-slot:title>Pinjam Buku</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Transaksi</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <div class="flex justify-between mb-5">
                <h1 class="text-sm font-semibold">Pinjam Buku</h1>
                <div class="flex flex-row-reverse items-start relative">
                    <img src="{{asset('/assets/icons/info.svg')}}" alt="" class="w-7 cursor-pointer ml-2 rules-btn">
                    <div class="rules-list bg-[#F2F9FE] rounded-lg p-3 absolute mr-8 hidden rules">
                        <h2 class="font-semibold text-lg">Aturan Peminjaman</h2>
                        <ol class="list-inside list-decimal w-[35rem] flex flex-col gap-1">
                            <li>Batas waktu pengembalian adalah 7 hari setelah buku dipinjam</li>
                            <li>Denda akan dimulai setelah telat pengembalian hari pertama senilai 10.000 dan akan bertambah senilai 10.000 setelah 3 hari berikutnya</li>
                            <li>Anggota hanya dapat meminjam 2 buku dalam satu waktu</li>
                        </ol>
                    </div>
                </div>
            </div>
            @if ($status == 'meminjam')
                <h2 class="font-semibold text-lg text-red-600">Anda sedang meminjam buku, tidak dapat melakukan peminjaman lagi</h2>
            @else
                <form action="{{route('user.add')}}" method="POST" class="flex flex-col gap-4 items-start">
                    @csrf
                    <ul class="flex flex-col gap-6 w-full">
                        <li class="flex flex-col">
                            <label for="nama" class="mb-1">Nama Peminjaman: </label>
                            <input type="text" name="nama" value="{{Auth::user()->name}}" readonly id="nama" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                        </li>
                        <li class="flex flex-col">
                            <label for="title" class="mb-1">Judul Buku: </label>
                            <select name="title" id="title" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]">
                                @foreach ($data as $item)
                                    <option value="{{$item->judul_buku}}">{{$item->judul_buku}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="flex flex-col">
                            <label for="pinjam" class="mb-1">Tanggal Pinjam: </label>
                            <input type="date" name="pinjam" id="pinjam" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                        </li>
                    </ul>
                    <button type="submit" name="submit" class="bg-blue-900 rounded-lg px-4 py-2 text-white">Pinjam</button>
                </form>
            @endif
        </div>
    </section>
</x-layout>