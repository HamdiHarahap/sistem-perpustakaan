<x-layout>
    <x-slot:title>Tambah Buku</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Tambah Buku</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <div class="flex justify-between mb-5">
                <h1 class="text-sm font-semibold">Tambah Buku</h1>
                <a href="/admin/books" class="text-sm font-semibold text-blue-600">Kembali</a>
            </div>
            <form action="{{route('book.post')}}" method="POST" class="flex flex-col gap-4 items-start" enctype="multipart/form-data">
                @csrf
                <ul class="flex flex-col gap-6 w-full">
                    <li class="flex flex-col">
                        <label for="title" class="mb-1">Judul Buku: </label>
                        <input type="text" name="title" id="title" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                    </li>
                    <li class="flex flex-col">
                        <label for="penulis" class="mb-1">Penulis: </label>
                        <input type="text" name="penulis" id="penulis" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                    </li>
                    <li class="flex flex-col">
                        <label for="penerbit" class="mb-1">Peneribit: </label>
                        <input type="text" name="penerbit" id="penerbit" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                    </li>
                    <li class="flex flex-col">
                        <label for="year" class="mb-1">Tahun Terbit: </label>
                         <input type="number" name="tahun" id="year" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                    </li>
                </ul>
                <button type="submit" name="submit" class="bg-blue-900 rounded-lg px-4 py-2 text-white">Submit</button>
            </form>
        </div>
    </section>
</x-layout>