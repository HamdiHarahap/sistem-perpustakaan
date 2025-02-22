<x-layout>
    <x-slot:title>Kelola User</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Users</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <div class="flex justify-between">
                <h1 class="text-sm font-semibold">Daftar User</h1>
            </div>
            <table class="border mr-4 w-full mt-4">
                <tr class="border text-left bg-blue-900 text-white">
                    <th class="p-2">No</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Password</th>
                    <th class="p-2">Status</th>
                </tr>
                <?php $no = 1 ?>
                @foreach ($data as $item) 
                    <tr class="border">
                        <td class="p-2">{{$no++}}</td>
                        <td class="p-2">{{$item->name}}</td>
                        <td class="p-2">{{$item->email}}</td>
                        <td class="p-2">{{$item->password}}</td>
                        <td class="p-2">
                            <p class="rounded-lg p-2 {{$item->status == 'tidak meminjam' ? 'bg-green-600' : 'bg-red-600'}} w-fit text-white">
                                {{$item->status}}
                            </p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</x-layout>