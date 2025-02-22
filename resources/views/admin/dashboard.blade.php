<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Dashboard | {{Auth::user()->name}}</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Jumlah User</h2>
                    <p class="text-lg font-bold">{{$hitungUser}}</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Jumlah Buku</h2>
                    <p class="text-lg font-bold">{{$hitungBuku}}</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Jumlah Peminjaman</h2>
                    <p class="text-lg font-bold">{{$hitungPinjam}}</p>
                </div>
            </div>
        </div>
    </section>
</x-layout>