<x-layout>
    <x-slot:title>Edit Buku</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Edit Buku</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <div class="flex justify-between mb-5">
                <h1 class="text-sm font-semibold">Edit Buku</h1>
                <a href="/admin/books" class="text-sm font-semibold text-blue-600">Kembali</a>
            </div>
            <form action="{{route('book.put', ['id' => $data->id])}}" method="POST" class="flex flex-col gap-4 items-start" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <ul class="flex flex-col gap-6 w-full">
                    <li class="flex flex-col">
                        <label for="title" class="mb-1">Judul Buku: </label>
                        <input type="text" value="{{$data->judul_buku}}" name="title" id="title" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                    </li>
                    <li class="flex flex-col">
                        <label for="penulis" class="mb-1">Penulis: </label>
                        <input type="text" value="{{$data->penulis}}" name="penulis" id="penulis" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                    </li>
                    <li class="flex flex-col">
                        <label for="penerbit" class="mb-1">Peneribit: </label>
                        <input type="text" value="{{$data->penerbit}}" name="penerbit" id="penerbit" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                    </li>
                    <li class="flex flex-col">
                        <label for="year" class="mb-1">Tahun Terbit: </label>
                        <select name="tahun" id="year" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" required>
                            @for ($year = 2000; $year <= now()->year; $year++)
                                <option value="{{ $year }}" {{ $data->tahun_terbit == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>
                    </li>
                    
                </ul>
                <button type="submit" name="submit" class="bg-blue-900 rounded-lg px-4 py-2 text-white">Submit</button>
            </form>
        </div>
    </section>
</x-layout>