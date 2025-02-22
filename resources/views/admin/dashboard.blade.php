<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] py-16">
        <h1 class="text-lg font-semibold">Selamat Datang {{Auth::user()->name}}</h1>
    </section>
</x-layout>