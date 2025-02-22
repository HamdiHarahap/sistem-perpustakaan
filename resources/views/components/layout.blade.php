<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/js/status.js'])
</head>
<body>
    @unless(request()->is('login') || request()->is('register'))
        @if(request()->is('admin*')) 
            <x-sidebar.admin-sidebar>
                <x-slot:page>{{ $page }}</x-slot:page>
            </x-sidebar.admin-sidebar>
        @elseif(request()->is('user*'))
            <x-sidebar.user-sidebar>
                <x-slot:page>{{ $page }}</x-slot:page>
            </x-sidebar.user-sidebar>
        @endif
    @endunless


    <main class="bg-[#F2F9FE] min-h-screen">
        {{$slot}}
    </main>
</body>
</html>